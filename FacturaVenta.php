<?php


require('pdf/fpdf.php');

include "conectar.php";
include 'class/pdfclass.php';
$c = new Conectar();
$conectar = $c->ConectarMetodo();
$idc = $_GET['factura'];




$sql = "SELECT * FROM ventas WHERE id = '$idc'";
$c = new Conectar();
$conectar = $c->ConectarMetodo();
$resultado = mysqli_query($conectar, $sql);
  
        foreach ($resultado as $compra) {
         
        $cliente = $compra['id_cliente_venta'];
        $fecha = $compra['fecha'];
        $total = $compra['total'];
        
}
$usudatos = "SELECT * from cliente_venta WHERE id_c = '$cliente'";

$resultado = mysqli_query($conectar, $usudatos);
foreach ($resultado as $pdatos) {
  $nombre = $pdatos['nombre_c'];
  $apellido = $pdatos['apellido_c'];
}
$sql = "SELECT * from productos_vendidos c INNER JOIN productos p where p.idpr like c.producto and c.id_venta = '$idc'";

$pdf = new PDF();
$value = "venta";
$ci = "C.I ";
$pdf->datos($sql,$idc,$nombre,$apellido, $value, $ci);
$pdf->AliasNbPages();
$pdf->AddPage();




// Información de la factura
#$customer_address = 'Av. Siempreviva 123, Springfield';

$pdf->info($idc, $fecha, $cliente, $total);

// Guardar archivo PDF
$pdf->Output('factura_venta.pdf', 'D');
#$pdf->Output('nombre_del_archivo.pdf', 'D');

?>



