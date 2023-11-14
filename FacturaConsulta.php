<?php
include "conectar.php";
include 'pdf/fpdf.php';
session_start();
$c = new Conectar();
$conectar = $c->ConectarMetodo();
$idc = $_GET['id_consulta'];


class PDF extends FPDF {
public $sql;
public $idc;



function datos($idc,$nombre,$race, $nombre_dueno, $apellido_dueno, $telefono_dueno, $id_dueno, $fecha, $total){
    #datos consulta
    $this->idc = $idc;
 
    $this->fecha =$fecha;
    $this->total =$total;
    #datos cliente
    $this->id_dueno = $id_dueno;
    $this->nombre_dueno = $nombre_dueno;
    $this->apellido_dueno = $apellido_dueno;
    $this->telefono_dueno = $telefono_dueno;
    #datos mascota
    $this->nombre = $nombre;
    $this->race = $race;
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
        $this->SetFont('Arial', '', 10);
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
 



            $this->Cell($w[0], 6, $key['servicio'] , 'LR', 0, 'L', $fill);
            $this->Cell($w[1], 6, "$".$key['subtotal'] , 'LR', 0, 'L', $fill);

            $this->Ln();
            
            }

            $fill = !$fill;
        
        // Línea de cierre
        $this->Cell(array_sum($w), 0, '', 'T');
    }

    // Información de la factura
    function info($idc, $fecha, $total) {
        // Título
        $this->SetFont('Arial', 'B', 14);
        $this->Cell(0, 55, 'Factura de Servicio "Tu perruqueria" No. '.$idc, 0, 1);
        $this->Ln(10);
        // Datos del cliente
        $this->SetFont('Arial', '', 12);
        $this->Cell(0, 6, 'Fecha: '.$fecha, 0, 1);
            

            #$sql = "SELECT * from proveedor WHERE id_p = '$proveedor'";


        $this->Cell(0, 6, 'Cliente: C.I.'.$this->id_dueno.", ".$this->nombre_dueno." ".$this->apellido_dueno, 0, 1);
         $this->Cell(0, 6, 'Telefono: '.$this->telefono_dueno, 0, 1);
         $this->Cell(0, 6, 'Mascota: '.$this->nombre, 0, 1);
         $this->Cell(0, 6, 'Raza: '.$this->race, 0, 1);
        #$this->Cell(0, 6, 'Dirección: '.$customer_address, 0, 1);
        $this->Ln(10);
        // Tabla de productos
        $data = "A";
        #$total = 1;
        $header = array('Servicio', 'Costo');
        $this->ProductsTable($header, $data);
 
        // Total
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(0, 10, 'Total: $'.$total, 0, 1, 'R');
    }
}





$sql = "SELECT * FROM consulta WHERE id_consulta = '$idc'";
$c = new Conectar();
$conectar = $c->ConectarMetodo();
$resultado = mysqli_query($conectar, $sql);
  
        foreach ($resultado as $consulta) {
         
        $perro = $consulta['id_perro'];
        
        $fecha = $consulta['fecha'];
        $total = $consulta['precio'];
        
}


$usudatos = "SELECT * from perro inner join cliente inner join detalle_perro WHERE cliente.id_cliente = detalle_perro.id_dueno and perro.id_perro = '$perro'";

$resultado = mysqli_query($conectar, $usudatos);
foreach ($resultado as $pdatos) {
  $nombre = $pdatos['nombre_perro'];
  $race = $pdatos['raza_perro'];
  $dueno = $pdatos['id_dueno'];
  $nombre_dueno = $pdatos['nombre_cliente'];
  $apellido_dueno = $pdatos['apellido_cliente'];
  $telefono_dueno = $pdatos['telefono_cliente'];
  $id_dueno = $pdatos['id_dueno'];
}

$pdf = new PDF();

$pdf->datos($idc,$nombre,$race, $nombre_dueno, $apellido_dueno, $telefono_dueno, $id_dueno, $fecha, $total);
$pdf->AliasNbPages();
$pdf->AddPage();




// Información de la factura
#$customer_address = 'Av. Siempreviva 123, Springfield';

$pdf->info($idc, $fecha, $total);

// Guardar archivo PDF
$pdf->Output('factura_servicio.pdf', 'D');
#$pdf->Output('nombre_del_archivo.pdf', 'D');

?>






?>