<?php
    $id = $_POST['id'];
    $metodo = $_POST['metodo'];
    $motivo = $_POST['motivo'];
    $monto = $_POST['monto'];
    $con = new mysqli('localhost','p9000026_db','26390042Po','p9000026_db');
    $update = $con->query("UPDATE enviodomicilio SET metodo = '$metodo', motivo = '$motivo', monto = $monto WHERE id = $id");
    $mensaje = "¡Se ha liquidado el pedido, con éxito!";
    if(!$update){
        $mensaje = "ERROR DE CONEXIÓN ".$con->error;
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="CARLITOS, carlitos, Carlitos, fiambreria, jamon, queso, lacteos,
    distribuidora, fiambres, fiambre, oferta, fiambreria el palomar, fiambreria carlitos, 
    El Palomar, el palomar, palomar">
    <title>Pedido editado con éxito - Distribuidora Carlitos, S.A</title>
    <link rel="icon" href="../../../image/favicon.png" type="image/png">
    <link rel="stylesheet" type="text/css" href="../../../css/estilosLista.css">
    <link rel="stylesheet" type="text/css" href="../../../boot/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../css/estilosdescroll.css">
</head>
<body>
    <header>
        <nav>
          <ul id="menu">
            <li>
                <img src="../../../image/logo.png" alt="Logo de distribuidora carlitos"/>
            </li>
          </ul>
        </nav>
    </header>
    <div class="container-fluid" style="background-color: rgba(253, 214, 42,0.8);padding: 10%;padding-top: 15%;">
      <div class="col-12">
        
        <h1><?php echo $mensaje?></h1>
          
      </div>
      <span class="col-12">
        &copy; Todos los derechos reservados a Distribuidora Carlitos, S.A.
        Servicio habilitado solo por las limitaciones de sanidad empleadas.
      </span>
    </div>
    <!--Los script-->
    <script src="../../../scripts/jquery-3.4.1.min.js"></script>
    <script src="../../../scripts/jqueryLAZY.js"></script>
    <script src="../../../boot/js/bootstrap.min.js"></script>
    <script src="../../../scripts/script.js"></script>
    <script src="../../../scripts/eskju.jquery.scrollflow.min.js"></script>  
</body>
</html>