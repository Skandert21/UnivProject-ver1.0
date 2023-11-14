<?php
include "conectar.php";
include 'pdf/fpdf.php';
$c = new Conectar();
$conectar = $c->ConectarMetodo();
$idc = $_GET['id'];


class AdopPDF extends FPDF {
public $sql;
public $idc;



function datos(){
    
}
    // Encabezado
    function Header() {

        $title = 'Constancia de adopción';

        // Logo
       # $this->Image('ruta/a/tu/logo.png', 10, 10, 30);
        // Fuente y color del título
        $this->SetFont('Arial', 'B', 25);
        $this->SetTextColor(0, 0, 0);
        // Título
        $this->Cell(80);
        $this->Cell(30, 10,utf8_decode($title), 0, 0, 'C');
        $this->Ln(20);
    }

    // Pie de página
    function Footer() {
        // Posición en 1.5 cm del final
        $this->SetY(-15);
        // Fuente y color del texto
        $this->SetFont('Arial', '', 10);
        $this->SetTextColor(128, 128, 128);
        
    }

    // Tabla de productos
    function ProductsTable($header, $data) {
        // Colores, fuente y ancho de línea
        $this->SetFillColor(240, 240, 240);
        $this->SetTextColor(0);
        $this->SetFont('Arial', 'B', 12);
        $this->SetLineWidth(0.2);
        // Encabezado
        $w = array(100, 50);
        for ($i = 0; $i < count($header); $i++) {
            $this->Cell($w[$i], 5, $header[$i], 1, 0, 'C', true);
        }
        $this->Ln();
        // Datos
        $this->SetFont('Arial', '', 12);
        $this->SetFillColor(255);
        $fill = false;

         $idc = $this->idc;
         $c = new Conectar();
$conectar = $c->ConectarMetodo();
$sql ="SELECT * FROM consulta_detalle where id_con = '$idc'";
$resultado = mysqli_query($conectar, $sql);
foreach ($resultado as $key) {
    


#$sql = "SELECT * from productos_comprados c INNER JOIN productos p where p.id like c.producto and c.id_compra = '$idc'";
 

            $this->Ln();
            
            }

            $fill = !$fill;
        
        // Línea de cierre
        $this->Cell(array_sum($w), 0, '', 'T');
    }

    // Información de la factura
    function info() {
$idc = $_GET['id'];
$sql = "SELECT * FROM adopcion WHERE id = '$idc'";
$c = new Conectar();
$conectar = $c->ConectarMetodo();
$resultado = mysqli_query($conectar, $sql);
  
        foreach ($resultado as $r) {
         $id_nuevodueno = $r['id_dueno_uno'];
         $id_viejodueno = $r['id_dueno_dos']; 
         $idp = $r['id_perro'];
}

$sql = "SELECT * FROM perro WHERE id_perro = '$idp'";

$resultado = mysqli_query($conectar, $sql);
  
        foreach ($resultado as $r) {
         $mascota = $r['nombre_perro'];
         $race = $r['raza_perro'];
}

$sql = "SELECT * FROM cliente WHERE id_cliente = '$id_viejodueno'";

$resultado = mysqli_query($conectar, $sql);
  
        foreach ($resultado as $r) {
         $viejodueno = $r['nombre_cliente']." ".$r['apellido_cliente'];
}
$sql = "SELECT * FROM cliente WHERE id_cliente = '$id_nuevodueno'";
$resultado = mysqli_query($conectar, $sql);
  
        foreach ($resultado as $r) {
         $nuevodueno = $r['nombre_cliente']." ".$r['apellido_cliente'];
}


$FechaActual = date('Y-m-d');
$dia = date('d');
$mes = date('m');
$ano = date('y');
 if ($mes) {

    
if ($mes == '01') {
   $mes = 'Enero';
} elseif ($mes == '02') {
  $mes = 'Febrero';
} elseif ($mes == '03') {
    $mes = 'Marzo';
} elseif ($mes =='04') {
  $mes = 'Abril';
} elseif ($mes == '05') {
    $mes = 'Mayo';
} elseif ($mes == '06') {
    $mes = 'Junio';
} elseif ($mes== '07') {
    $mes = 'Julio';
} elseif ($mes == '08') {
   $mes = 'Agosto';
} elseif ($mes == '09') {
    $mes = 'Septiembre';
} elseif ($mes == '10') {
   $mes = 'Octubre';
} elseif ($mes == '11') {
   $mes = 'Noviembre';
} elseif ($mes = '12') {
   $mes = 'Diciembre';
}
}
 
    
        // Datos del cliente
        $this->SetFont('Arial', '', 9);
        $this->Cell(0, 6, utf8_decode('Fecha de expedición: '.$FechaActual), 0, 1);
            

            #$sql = "SELECT * from proveedor WHERE id_p = '$proveedor'";
        $this->Ln(20);
 $this->SetMargins(0,0, 20);
   $this->SetFont('Arial', '', 12);
 $this->Cell(15);
 $this->MultiCell(00, 10, utf8_decode('   Quien suscribe, el ciudadano '.$viejodueno.' titular de la cédula N.'.$id_viejodueno.' dueño de la mascota '.$mascota.' de raza "'.$race.'", hace constar por medio de la presente que el ciudadano '.$nuevodueno.', titular de la cédula N.'.$id_nuevodueno.' recibe todas las responsabilidades y la titularidad como nuevo dueño del anterior propietario de dicha mascota'));
 $this->Ln(20);
 $this->Cell(15);
 $this->MultiCell(00, 10, utf8_decode('     Esta Constancia se expide a los '.$dia.' dias del mes de '.$mes.' del año 20'.$ano));
 $this->Ln(60); 
 $this->Cell(15, 10, '          Firma:_______________________                          Firma:_______________________');
}
}






#datos a enviar

$pdf = new AdopPDF();

$pdf->datos();
$pdf->AliasNbPages();
$pdf->AddPage();




// Información de la factura
#$customer_address = 'Av. Siempreviva 123, Springfield';

$pdf->info();


// Guardar archivo PDF
$pdf->Output('Constancia_de_adopcion.pdf','D');
#$pdf->Output('nombre_del_archivo.pdf', 'D');

?>