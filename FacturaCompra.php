<?php


require('pdf/fpdf.php');

include "conectar.php";
include 'class/pdfclass.php';
$c = new Conectar();
$conectar = $c->ConectarMetodo();
$idc = $_GET['factura'];




$sql = "SELECT * FROM compra_alproveedor WHERE id = '$idc'";
$c = new Conectar();
$conectar = $c->ConectarMetodo();
$resultado = mysqli_query($conectar, $sql);
  
        foreach ($resultado as $compra) {
         
        $proveedor = $compra['proveedor'];
        $fecha = $compra['hecho'];
        $total = $compra['total'];
        
}
$usudatos = "SELECT * from proveedor WHERE id_p = '$proveedor'";

$resultado = mysqli_query($conectar, $usudatos);
foreach ($resultado as $pdatos) {
  $nombre = $pdatos['nombre_p'];

}
$sql = "SELECT * from productos_comprados c INNER JOIN productos p where p.idpr like c.producto and c.id_compra = '$idc'";

$pdf = new PDF();
$value = "compra";
$apellido="";
$ci = "J-";
$pdf->datos($sql,$idc,$nombre,$apellido, $value, $ci);
$pdf->AliasNbPages();
$pdf->AddPage();




// Información de la factura
#$customer_address = 'Av. Siempreviva 123, Springfield';

$pdf->info($idc, $fecha, $proveedor, $total);

// Guardar archivo PDF
$pdf->Output();
#$pdf->Output('nombre_del_archivo.pdf', 'D');

?>


