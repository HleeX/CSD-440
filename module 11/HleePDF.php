<?php
/**
 * Hlee Xiong
 * Bellevue University
 * CSD 440 - Module 11 Assignment
 */


error_reporting(E_ALL);
ini_set('display_errors', '1');


if (!defined('FPDF_FONTPATH')) {
    define('FPDF_FONTPATH', dirname(__FILE__) . '/font/');
}


if (file_exists(dirname(__FILE__) . '/fpdf.php')) {
    require_once(dirname(__FILE__) . '/fpdf.php');
} else {
    die("Fatal Error: fpdf.php is still missing from the main module 11 folder. Current execution path: " . dirname(__FILE__));
}


class JdmPDF extends FPDF {
    function Header() {
        // Dark slate banner background
        $this->SetFillColor(30, 41, 59); 
        $this->Rect(0, 0, 210, 35, 'F');
        
        // Banner Title
        $this->SetFont('Times', 'B', 20);
        $this->SetTextColor(241, 245, 249);
        $this->SetXY(15, 10);
        $this->Cell(0, 10, 'Japanese Domestic Market Inventory', 0, 1, 'L');
        
        // Banner Subtitle
        $this->SetFont('Arial', 'I', 10);
        $this->SetTextColor(148, 163, 184);
        $this->SetX(15);
        $this->Cell(0, 5, 'Database Records & Architectural Specifications Summary', 0, 1, 'L');
        
        $this->Ln(15);
    }

    function Footer() {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->SetTextColor(120, 113, 108);
        $this->Cell(100, 10, 'Bellevue University | CSD 440 Module 11', 0, 0, 'L');
        $this->Cell(0, 10, 'Page ' . $this->PageNo() . ' of {nb}', 0, 0, 'R');
    }
}


// DATABASE CONNECTION 
$servername = "localhost";
$username = "student1"; 
$password = "BayWatch123$";     
$dbname = "JapaneseDomestic"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Database Connection failed: " . $conn->connect_error);
}

// Fetch records from the database
$sql = "SELECT car_id, make, model, release_year, engine_type FROM Cars";
$result = $conn->query($sql);

//  INSTANTIATE AND BUILD THE PDF DOCUMENT
$pdf = new JdmPDF('P', 'mm', 'A4'); // Portrait, millimeters, A4 size
$pdf->AliasNbPages(); // Essential for tracking the total page count token {nb}
$pdf->AddPage();
$pdf->SetMargins(15, 20, 15);
$pdf->SetAutoPageBreak(true, 20);

// --- GENERAL INFORMATION SECTION ---
$pdf->SetFont('Arial', 'B', 12);
$pdf->SetTextColor(15, 23, 42); // Dark slate
$pdf->Cell(0, 6, 'GENERAL INFORMATION & OVERVIEW', 0, 1, 'L');

// Small underline bar accent
$pdf->SetDrawColor(56, 189, 248); // Sky blue accent color
$pdf->SetLineWidth(0.8);
$pdf->Line(15, $pdf->GetY(), 45, $pdf->GetY());
$pdf->Ln(4);

$pdf->SetFont('Arial', '', 10);
$pdf->SetTextColor(68, 64, 60); // Neutral dark body text
$overviewText = "The Japanese Domestic Market (JDM) refers to Japan's home market for vehicles and automotive components. Vehicles manufactured for the JDM are engineered to comply with strict Japanese governing regulations, resulting in highly efficient engine profiles, unique technological enhancements, and distinct aesthetic variations compared to their export counterparts. This database archive maps the architectural evolution of high-performance import platforms, tracking unique powertrain design codes, chassis release timelines, and performance index identifiers engineered during high-water marks of automotive development.";

// Output wrapped overview text block
$pdf->MultiCell(0, 6, $overviewText, 0, 'J');
$pdf->Ln(10);


// --- DATA TABLE SECTION ---
$pdf->SetFont('Arial', 'B', 12);
$pdf->SetTextColor(15, 23, 42);
$pdf->Cell(0, 6, 'DATABASE RECORDS: CARS TABLE', 0, 1, 'L');
$pdf->Line(15, $pdf->GetY(), 45, $pdf->GetY());
$pdf->Ln(4);

// Define layout widths for columns (Total width = 180mm to fit cleanly on A4 with margins)
$wId = 15;
$wMake = 35;
$wModel = 50;
$wYear = 20;
$wEngine = 60;

// Table Header Configuration
$pdf->SetFont('Arial', 'B', 10);
$pdf->SetFillColor(30, 41, 59); // Header background dark slate
$pdf->SetTextColor(255, 255, 255); // White text
$pdf->SetDrawColor(226, 232, 240); // Soft grey border
$pdf->SetLineWidth(0.2);

$pdf->Cell($wId, 10, 'ID', 1, 0, 'C', true);
$pdf->Cell($wMake, 10, 'MAKE', 1, 0, 'L', true);
$pdf->Cell($wModel, 10, 'MODEL', 1, 0, 'L', true);
$pdf->Cell($wYear, 10, 'YEAR', 1, 0, 'C', true);
$pdf->Cell($wEngine, 10, 'ENGINE TYPE', 1, 1, 'L', true); // '1' moves to next line

// Table Body Rows
$pdf->SetFont('Arial', '', 9.5);
$pdf->SetTextColor(51, 65, 85); // Charcoal text

$rowCount = 0;
$fill = false; // Alternating zebra striping logic

if ($result && $result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $rowCount++;
        
        // Set fill color for zebra striping
        if ($fill) {
            $pdf->SetFillColor(248, 250, 252); // Very light grey row background
        } else {
            $pdf->SetFillColor(255, 255, 255); // Pure white row background
        }
        
        $pdf->Cell($wId, 9, '#' . $row["car_id"], 'B', 0, 'C', true);
        $pdf->Cell($wMake, 9, $row["make"], 'B', 0, 'L', true);
        $pdf->Cell($wModel, 9, $row["model"], 'B', 0, 'L', true);
        $pdf->Cell($wYear, 9, $row["release_year"], 'B', 0, 'C', true);
        
        // Font treatment optimization for technical engine strings
        $pdf->SetFont('Courier', '', 9);
        $pdf->SetTextColor(2, 132, 199); // Blue text for engine codes
        $pdf->Cell($wEngine, 9, $row["engine_type"], 'B', 1, 'L', true);
        
        // Reset row fonts
        $pdf->SetFont('Arial', '', 9.5);
        $pdf->SetTextColor(51, 65, 85);
        
        $fill = !$fill; // Toggle zebra striping flag
    }
} else {
    // If table is empty
    $pdf->Cell(180, 10, 'The database table is currently empty.', 1, 1, 'C');
}

// Table Summary Footer Accent Row
$pdf->SetFont('Arial', 'B', 9);
$pdf->SetFillColor(241, 245, 249);
$pdf->SetTextColor(71, 85, 105);
$pdf->Cell($wId + $wMake + $wModel + $wYear, 10, ' Total Database Inventory Count', 'T', 0, 'L', true);
$pdf->Cell($wEngine, 10, $rowCount . ' Registered Vehicles ', 'T', 1, 'R', true);

// Close database connection
$conn->close();

// 5. OUTPUT GENERATED PDF TO BROWSER INLINE
$pdf->Output('I', 'JDM_Inventory_Report.pdf');
?>