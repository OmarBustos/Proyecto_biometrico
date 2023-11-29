<?php

require('./fpdf.php');

class PDF extends FPDF
{

   // Cabecera de página
   function Header()
   {
      //include '../../recursos/Recurso_conexion_bd.php';//llamamos a la conexion BD

      //$consulta_info = $conexion->query(" select *from hotel ");//traemos datos de la empresa desde BD
      //$dato_info = $consulta_info->fetch_object();
      $this->Image('LogoLLanadas.jpeg', 270, 5, 20); //logo de la empresa,moverDerecha,moverAbajo,tamañoIMG
      $this->SetFont('Arial', 'B', 19); //tipo fuente, negrita(B-I-U-BIU), tamañoTexto
      $this->Cell(95); // Movernos a la derecha
      $this->SetTextColor(0, 0, 0); //color
      //creamos una celda o fila
      $this->Cell(110, 15, utf8_decode('I.E. LAS LLANADAS'), 1, 1, 'C', 0); // AnchoCelda,AltoCelda,titulo,borde(1-0),saltoLinea(1-0),posicion(L-C-R),ColorFondo(1-0)
      $this->Ln(3); // Salto de línea
      $this->SetTextColor(103); //color

      /* UBICACION */
      $this->Cell(180);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(96, 10, utf8_decode("Ubicación : "), 0, 0, '', 0);
      $this->Ln(5);

      /* TELEFONO */
      $this->Cell(180);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(59, 10, utf8_decode("Teléfono : "), 0, 0, '', 0);
      $this->Ln(5);

      /* COREEO */
      $this->Cell(180);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(85, 10, utf8_decode("Correo : "), 0, 0, '', 0);
      $this->Ln(5);

      /* TELEFONO */
      $this->Cell(180);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(85, 10, utf8_decode("Sucursal : "), 0, 0, '', 0);
      $this->Ln(10);

      /* TITULO DE LA TABLA */
      //color
      $this->SetTextColor(228, 100, 0);
      $this->Cell(100); // mover a la derecha
      $this->SetFont('Arial', 'B', 15);
      $this->Cell(100, 10, utf8_decode("HORARIO GENERAL DE PROFESORES "), 0, 1, 'C', 0);
      $this->Ln(7);

      /* CAMPOS DE LA TABLA */
      //color
      $this->SetFillColor(228, 100, 0); //colorFondo
      $this->SetTextColor(255, 255, 255); //colorTexto
      $this->SetDrawColor(163, 163, 163); //colorBorde
      $this->SetFont('Arial', 'B', 11);
      $this->Cell(15, 10, utf8_decode('N°'), 1, 0, 'C', 1);
      $this->Cell(65, 10, utf8_decode('PROFESOR'), 1, 0, 'C', 1);
      $this->Cell(40, 10, utf8_decode('LUNES'), 1, 0, 'C', 1);
      $this->Cell(40, 10, utf8_decode('MARTES'), 1, 0, 'C', 1);
      $this->Cell(40, 10, utf8_decode('MIERCOLES'), 1, 0, 'C', 1);
      $this->Cell(40, 10, utf8_decode('JUEVES'), 1, 0, 'C', 1);
      $this->Cell(40, 10, utf8_decode('VIERNES'), 1, 1, 'C', 1);
   }

   // Pie de página
   function Footer()
   {
      $this->SetY(-15); // Posición: a 1,5 cm del final
      $this->SetFont('Arial', 'I', 8); //tipo fuente, negrita(B-I-U-BIU), tamañoTexto
      $this->Cell(0, 10, utf8_decode('Página ') . $this->PageNo() . '/{nb}', 0, 0, 'C'); //pie de pagina(numero de pagina)

      $this->SetY(-15); // Posición: a 1,5 cm del final
      $this->SetFont('Arial', 'I', 8); //tipo fuente, cursiva, tamañoTexto
      $hoy = date('d/m/Y');
      $this->Cell(540, 10, utf8_decode($hoy), 0, 0, 'C'); // pie de pagina(fecha de pagina)
   }
}

include '../conexion.php';
//require '../../funciones/CortarCadena.php';
/* CONSULTA INFORMACION DEL HOSPEDAJE */
//$consulta_info = $conexion->query(" select *from hotel ");
//$dato_info = $consulta_info->fetch_object();

$pdf = new PDF();
$pdf->AddPage("landscape"); /* aqui entran dos para parametros (horientazion,tamaño)V->portrait H->landscape tamaño (A3.A4.A5.letter.legal) */
$pdf->AliasNbPages(); //muestra la pagina / y total de paginas

$i = 0;
$pdf->SetFont('Arial', '', 12);
$pdf->SetDrawColor(163, 163, 163); //colorBorde

// Fetch the list of professors and their class schedules
$consulta_profesores = $con->query("SELECT p.id_profesor, p.nombre AS nombre_profesor, p.apellido, GROUP_CONCAT(h.dia ORDER BY h.dia) 
         AS dias_clase, GROUP_CONCAT(h.hora_inicio ORDER BY h.dia) AS horas_inicio, GROUP_CONCAT(h.hora_final ORDER BY h.dia) 
         AS horas_final FROM profesor p LEFT JOIN horario h ON p.id_profesor = h.id_profesor GROUP BY p.id_profesor
         ORDER BY p.nombre");

$i = 0;

while ($datos_profesor = $consulta_profesores->fetch_object()) {
   $i = $i + 1;
   $pdf->Cell(15, 15, utf8_decode("$i"), 1, 0, 'C', 0);
   $pdf->Cell(65, 15, utf8_decode($datos_profesor->nombre_profesor . ' ' . $datos_profesor->apellido), 1, 0, 'C', 0);

   $dias_clase = explode(',', $datos_profesor->dias_clase);
   $horas_inicio = explode(',', $datos_profesor->horas_inicio);
   $horas_final = explode(',', $datos_profesor->horas_final);

   $dias_semana = ["LUNES", "MARTES", "MIÉRCOLES", "JUEVES", "VIERNES"];

   for ($j = 0; $j < count($dias_semana); $j++) {
      if (in_array($dias_semana[$j], $dias_clase)) {
         $pdf->Cell(40, 15, utf8_decode($horas_inicio[$j]  . ' - ' . $horas_final[$j]), 1, 0, 'C', 0);
      } else {
         $pdf->Cell(40, 15, utf8_decode(""), 1, 0, 'C', 0);
      }
   }

   $pdf->Ln();
}


$pdf->Output('Horarios.pdf', 'I');//nombreDescarga, Visor(I->visualizar - D->descargar)
