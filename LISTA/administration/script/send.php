<?php
    $id = isset($_GET['id'])? $_GET['id'] : $_POST['id'];
    $con = new mysqli('localhost','p9000026_db','26390042Po','p9000026_db');
    $consulta = $con->query("SELECT * FROM enviodomicilio WHERE id = $id");
    if(!$consulta){
        echo "ERROR DE CONEXIÓN ".$con->error;
    }
    $result = $consulta->fetch_assoc();

    if(isset($_POST['correo'])){
        $pago = $_POST['metodo'];
        $direccion = $result['direccion'];
        $cliente = $result['cliente'];
        $documento = $result['documento'];
        $monto = isset($_POST['monto']) ? $_POST['monto'] : "#ERRORCONELMONTO";
        $correo = $result['mail'];
        $asunto = '[Pedido Armado] - ' .$documento . ' / ' .$cliente;

        $update = $con->query("UPDATE enviodomicilio SET metodo = '$pago', monto = $monto WHERE id = $id");
        $header= 'From: envios@carlitos.com.ar' . " \r\n";
        $header.= "X-Mailer: PHP/" . phpversion() . " \r\n";
        $header.= "Mime-Version: 1.0 \r\n";
        $header.= "Content-Type: text/html;charset=utf-8";
        $mensaje= "<!DOCTYPE html>
         <html lang='es'>
         <head>
             <meta http-equiv='Content-type' content='text/html; charset=utf-8' />
             <meta name='viewport' content='width=device-width, initial-scale=1.0'>
             <title>Document</title>
             <style>
     
     
                 *{
                     margin: 0;
                     padding: 0;
                 }
                 header {
                     width: 100%;
                     height: 90px;
                     position: relative;
                     background-repeat: no-repeat;
                     background-size: cover;
                     background-position: center center;
                     background-attachment: fixed;
                     z-index: 10;
                     margin-bottom: 1%;
                 }
                 header nav {
                     position: fixed;
                     width: 100%;
                     /*height: 100%;*/
                     background-color: rgba(36, 36, 36, 1);
                     margin-bottom: 1%;
                 }
                 header ul {
                     display: flex;
                     justify-content: space-between;
                     top:0;
                     width: 95%;
                     max-width: 1000px;
                     margin: 0 auto;
                     list-style: none;
                     background-color: transparent;
                 }
                 header nav ul a img {
                     display: block;
                     position: relative;
                     top: 50vh;
                     transform: translateY(-50%);
                     width: 300px;
                     height: 300px;
                     transition: all 0.3s;
                     left: 0px;
                 }
                 #menu li{
                     text-align: center;
                 }
     
                 #menu img{
                     width: 8%;
                     margin: 0 auto;
                 }
                 .cliente{
                     padding: 5%;
                     padding-top: 1%;
                 }
     
                 .cliente h1{
                     text-align: center;
                     color: #BC3C00;
                 }
     
                 .hashtag{
                     color: #FFD011;
                 }
             </style>
     
         </head>
         <body>
             <header>
                 <nav>
                     <ul id='menu'>
                         <li>
                             <img src='http://carlitos.com.ar/image/logo.png' alt='Logo de distribuidora carlitos'>
                         </li>
                     </ul>
                 </nav>
             </header>
             <div class='cliente'>
                 <h1>Pago a realizar para Distribuidora Carlitos</h1><br>
     
                 <p>Hola <b>" . $cliente . "</b>, le avisamos que su pedido número <b>" . $id. "</b> 
                 ha sido preparado para enviar a " . $direccion . " con el método de pago <b>" . $pago . "</b> con monto de <b>". $monto ."</b></p><br>
     
                 <p>Si el método de pago que figura en esté correo es transferencia le pedimos que realice la misma con los siguiente datos:</p><br>
                 <ul>
                    <li><b>Razón Social:</b> Distribuidora Carlitos, S.A</li>
                    <li><b>CUIT:</b> 30-70835169-1</li>
                    <li><b>Cuenta N°:</b> 907/02102112-13</li>
                    <li><b>CBU N°:</b> 0150907002000102112135</li>
                 </ul><br>

                 <p>Por lo contrario, si el método de pago es efectivo, deberá ser abonado al remisero en el momento de la entrega,
                 pedimos que por favor tome el método de pago que hemos anexado en esté correo, como el método de pago final
                 ya que el mismo es el que usted ha solicitado en cuanto realizo el pedido, porque de hacerlo de otra manera
                 podría generarnos un descontrol en relación a los pedidos.</p><br>

                 <p>Te pedimos que cualquier consulta que quieras agregar escribas a 
                 nuestro whatsapp <b>+5491135523641</b>... <b> Por whatsapp no se realiza cambio de método de pago</b>,
                 por favor no insistamos. Muchas gracias. 
                 </p><br>
     
                 <p> Siguenos en nuestras redes sociales como <a href='https://www.instagram.com/distcarlitos/'><b>@distcarlitos</b></a>, y aprovecha las 
                     promociones que publicamos semanales
                 </p> <br>
     
                 <p class='hashtag'><b>#seamosresponsables #quedateencasa</b></p>
             </div>
             
         </body>
         </html>
         ";
        
        
        mail($correo, $asunto, utf8_decode($mensaje), $header);

        echo '<!DOCTYPE html>
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
                
                <h1>¡Ha sido enviado el mensaje con éxito!</h1>
                  
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
        </html>';
        
    } else{
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="keywords" content="CARLITOS, carlitos, Carlitos, fiambreria, jamon, queso, lacteos,
    distribuidora, fiambres, fiambre, oferta, fiambreria el palomar, fiambreria carlitos, 
    El Palomar, el palomar, palomar">
    <meta name="description" content="Fiambre y lacteos del campo a su mesa">
    <title>ENVÍO DE TRANSFERENCIA - Distribuidora Carlitos, S.A</title>
    <link rel="icon" href="../../image/favicon.png" type="image/png">
    <!-- Estilos -->
    <link rel="stylesheet" type="text/css" href="../../boot/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../../css/estilos.css">
    <link rel="stylesheet" href="../../css/estilosdescroll.css">
</head>
<body>
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="card container-fluid">
                <div class="card-body">
                    <h4 class="card-title">Pedido número: <?php echo $result['id']?></h5>
                    <h6 class="card-subtitle text-muted mb-2"><?php echo $result['cliente']. " DNI: ". $result['documento']?></h6>
                    <form action="/administration/script/send.php" method="POST">
                        <div class="form-group">
                            <input type="hidden" name="id" id="id" value="<?php echo $result['id']?>">
                            <label for="correo">Correo:</label>
                            <input type="email" name="correo" id="correo" class="form-control" value="<?php echo $result['mail']?>"><br>
                            <label for="metodo">Método de pago:</label>
                            <select name="metodo" id="metodo">
                                <option value="efectivo">EFECTIVO</option>
                                <option value="mercadopago">MERCADO PAGO</option>
                                <option value="transferencia">TRANSFERENCIA</option>
                            </select><br>
                            <label for="monto">Monto:</label>
                            <input type="number" step="0.01" name="monto" id="monto" class="form-control" value="<?php echo $result['monto']?>"><br>
                            <input type="submit" value="Actualizar" class="form-control btn btn-success">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<?php

    }

 
?>