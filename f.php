<?php require('pdf/fpdf.php');
include "conectar.php";
class PDF extends FPDF {
    // Encabezado
    function Header() {
        // Logo
       # $this->Image('ruta/a/tu/logo.png', 10, 10, 30);
        // Fuente y color del título
        $this->SetFont('Arial', 'B', 15);
        $this->SetTextColor(0, 0, 0);
        // Título
        $this->Cell(80);
        $this->Cell(30, 10, 'Factura', 0, 0, 'C');
        $this->Ln(20);
    }

    // Pie de página
    function Footer() {
        // Posición en 1.5 cm del final
        $this->SetY(-15);
        // Fuente y color del texto
        $this->SetFont('Arial', '', 10);
        $this->SetTextColor(128, 128, 128);
        // Número de página
        $this->Cell(0, 10, 'Página '.$this->PageNo().'/{nb}', 0, 0, 'C');
    }

    // Tabla de productos
    function ProductsTable($header, $data) {
        // Colores, fuente y ancho de línea
        $this->SetFillColor(240, 240, 240);
        $this->SetTextColor(0);
        $this->SetFont('Arial', 'B', 12);
        $this->SetLineWidth(0.2);
        // Encabezado
        $w = array(40, 50, 30, 30);
        for ($i = 0; $i < count($header); $i++) {
            $this->Cell($w[$i], 7, $header[$i], 1, 0, 'C', true);
        }
        $this->Ln();
        // Datos
        $this->SetFont('Arial', '', 12);
        $this->SetFillColor(255);
        $fill = false;


  
        foreach ($compras as $row) {


            $this->Cell($w[0], 6, $row["nombre_cliente"], 'LR', 0, 'L', $fill);
            $this->Cell($w[1], 6, $row["nombre_cliente"], 'LR', 0, 'L', $fill);
            $this->Cell($w[2], 6, $row["nombre_cliente"], 'LR', 0, 'R', $fill);
            $this->Cell($w[3], 6, $row["nombre_cliente"], 'LR', 0, 'R', $fill);
            $this->Ln();
            $fill = !$fill;
        }
        // Línea de cierre
        $this->Cell(array_sum($w), 0, '', 'T');
    }

    // Información de la factura
    function InvoiceInfo($invoice_id, $invoice_date, $customer_name, $customer_address, $total) {
        // Título
        $this->SetFont('Arial', 'B', 14);
        $this->Cell(0, 10, 'Factura No. '.$invoice_id, 0, 1);
        $this->Ln(10);
        // Datos del cliente
        $this->SetFont('Arial', '', 12);
        $this->Cell(0, 6, 'Fecha: '.$invoice_date, 0, 1);
        $this->Cell(0, 6, 'Cliente: '.$customer_name, 0, 1);
        $this->Cell(0, 6, 'Dirección: '.$customer_address, 0, 1);
        $this->Ln(10);
        // Tabla de productos
        $data = "A";
        $total = 1;
        $header = array('Producto', 'Descripción', 'Cantidad', 'Precio');
        $this->ProductsTable($header, $data);
        // Total
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(0, 10, 'Total: $'.$total, 0, 1, 'R');
    }
}

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

// Información de la factura
$invoice_id = '001';
$invoice_date = '24/07/2023';
$customer_name = 'Juan Pérez';
$customer_address = 'Av. Siempreviva 123, Springfield';
$total = '120.00';
$pdf->InvoiceInfo($invoice_id, $invoice_date, $customer_name, $customer_address, $total);

// Guardar archivo PDF
$pdf->Output();
#$pdf->Output('nombre_del_archivo.pdf', 'D');








?>
// Guardar archivo PDF
$pdf->Output('nombre_del_archivo.pdf', 'D');

?>