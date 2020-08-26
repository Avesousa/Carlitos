<?php 
    require('../complement/pdf/fpdf.php');

    $id = $_GET['id'];
    $con = new mysqli('localhost','p9000026_db','26390042Po','p9000026_db');
    $consulta = $con->query("SELECT * FROM enviodomicilio WHERE id = $id");
    if(!$consulta){
        echo "ERROR DE CONEXIÓN ".$con->error;
    }

    $result = $consulta->fetch_assoc();

    $pdf = new FPDF();
    $pdf->AddPage();

    // Logo
    $pdf->Image('../../image/logo.png',10,8,33);
    // Arial bold 15
    $pdf->SetFont('Arial','B',24);
    // Movernos a la derecha
    $pdf->Cell(80);
    // Título
    $pdf->Cell(30,10,utf8_decode('Pedido a domicilio n° '.$result['id']),0,0,'C');
    // Salto de línea
    $pdf->Ln(20);

    /* TITULO DE METODO*/
    $pdf->SetFont('Arial','B',20);
    $pdf->Cell(60,40,utf8_decode('Método de pago: '));
    /* CONTENIDO */
    $pdf->SetFont('Arial','',20);
    $pdf->Cell(100,40,utf8_decode($result['metodo']));
    $pdf->Ln(5);
    
    /* TITULO DE METODO*/
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(40,50,'Documento: ');
    /* CONTENIDO*/
    $pdf->SetFont('Arial','',12);
    $pdf->Cell(50,50,$result['documento']);
    $pdf->Ln(5);

    /* TITULO DE METODO*/
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(40,50,'Cliente: ');
    /* CONTENIDO*/
    $pdf->SetFont('Arial','',12);
    $pdf->Cell(50,50,$result['cliente']);
    $pdf->Ln(5);

    /* TITULO DE METODO*/
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(40,50,utf8_decode('Dirección: '));
    /* CONTENIDO*/
    $pdf->SetFont('Arial','',12);
    $pdf->Cell(50,50,$result['direccion']);
    $pdf->Ln(5);

    /* TITULO DE METODO*/
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(40,50,utf8_decode('Télefono: '));
    /* CONTENIDO*/
    $pdf->SetFont('Arial','',12);
    $pdf->Cell(50,50,$result['telefono']);
    $pdf->Ln(5);

    /* TITULO DE METODO*/
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(40,50,utf8_decode('Correo electrónico: '));
    /* CONTENIDO*/
    $pdf->SetFont('Arial','',12);
    $pdf->Cell(50,50,$result['mail']);
    $pdf->Ln(20);

    /*TITULO DE METODO*/
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(210,20,'Pedido: ');
    $pdf->Ln(15);
    /* CONTENIDO*/
    $pdf->SetFont('Arial','',12);
    $pdf->MultiCell(180,5,$result['pedido']);

    $pdf->Output();

    $con->query("UPDATE enviodomicilio SET impreso = 1 WHERE id = $id");

?>