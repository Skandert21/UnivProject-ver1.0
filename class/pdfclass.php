<?php

session_start();
class PDF extends FPDF {
public $sql;
public $idc;



function datos($sql, $idc, $nombre, $apellido, $value,$ci){
    $this->sql = $sql;
    $this->idc = $idc;
    $this->nombre = $nombre;
    $this->apellido = $apellido;
    $this->value =$value;
    $this->ci = $ci;
}
    // Encabezado
    function Header() {
        // Logo
        $this->Image('img/inv.jpg', 10, 10, 30);
        // Fuente y color del título
        $this->SetFont('Arial', 'B', 15);
        $this->SetTextColor(0, 0, 0);
        // Título
        $this->Cell(80);
        $this->Cell(30, 10, 'INVMERLIZ.C.A', 0, 0, 'C');
        $this->Ln(20);
    }

    // Pie de página
    function Footer() {
        // Posición en 1.5 cm del final
        $this->SetY(-15);
        // Fuente y color del texto
        $this->SetFont('Arial', "", 10);
        $this->SetTextColor(128, 128, 128);
        // Número de página
        $this->Cell(0, 10, 'Responsable del reporte: '.$_SESSION["username"], 0, 0, 'C');
        $this->Cell(0, 10, 'Pagina '.$this->PageNo().'/{nb}', 0, 0, 'C');
    }

    // Tabla de productos
    function ProductsTable($header, $data) {
        // Colores, fuente y ancho de línea
        $this->SetFillColor(240, 240, 240);
        $this->SetTextColor(0);
        $this->SetFont('Arial', 'B', 12);
        $this->SetLineWidth(0.2);
        // Encabezado
        $w = array(40, 50, 30, 30, 30);
        for ($i = 0; $i < count($header); $i++) {
            $this->Cell($w[$i], 7, $header[$i], 1, 0, 'C', true);
        }
        $this->Ln();
        // Datos
        $this->SetFont('Arial', '', 12);
        $this->SetFillColor(255);
        $fill = false;

         $idc = $this->idc;


#$sql = "SELECT * from productos_comprados c INNER JOIN productos p where p.id like c.producto and c.id_compra = '$idc'";
 $c = new Conectar();
$conectar = $c->ConectarMetodo();
$resultado = mysqli_query($conectar, $this->sql);
foreach ($resultado as $comprad) {
  $idproducto = $comprad['producto'];
  $cantidad = $comprad['cantidad'];
    $descripcion = $comprad['descripcion'];
    $precioVenta = $comprad['precioVenta'];

    #pequeño bugsito que no quise arreglar xd
    @$Subtotal = $comprad['subtotal'];

    if (!$Subtotal) {
        $Subtotal = $cantidad * $precioVenta;
    }
    



            $this->Cell($w[0], 6, $idproducto, 'LR', 0, 'L', $fill);
            $this->Cell($w[1], 6, $descripcion, 'LR', 0, 'L', $fill);
            $this->Cell($w[2], 6, $cantidad, 'LR', 0, 'R', $fill);
            $this->Cell($w[3], 6, $precioVenta."$", 'LR', 0, 'R', $fill);
            $this->Cell($w[4], 6, $Subtotal."$", 'LR', 0, 'R', $fill);
            $this->Ln();
            
            }

            $fill = !$fill;
        
        // Línea de cierre
        $this->Cell(array_sum($w), 0, '', 'T');
    }

    // Información de la factura
    function info($idc, $fecha, $proveedor, $total) {
        // Título
        $this->SetFont('Arial', 'B', 14);
        $this->Cell(0, 55, 'Factura de '.$this->value.' No. '.$idc, 0, 1);
        $this->Ln(10);
        // Datos del cliente
        $this->SetFont('Arial', '', 12);
        $this->Cell(0, 6, 'Fecha: '.$fecha, 0, 1);
            

            #$sql = "SELECT * from proveedor WHERE id_p = '$proveedor'";


        $this->Cell(0, 6, 'Beneficiario: '.$this->ci."".$proveedor.", ".$this->nombre." ".$this->apellido, 0, 1);
        #$this->Cell(0, 6, 'Dirección: '.$customer_address, 0, 1);
        $this->Ln(10);
        // Tabla de productos
        $data = "A";
        #$total = 1;
        $header = array('Producto', 'Descripcion','Cantidad', 'Precio', 'Subtotal');
        $this->ProductsTable($header, $data);
 
        // Total
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(0, 10, 'Total: $'.$total, 0, 1, 'R');
    }
}




?>