<?php

$cliente = $_POST['cliente'];
$mail = $_POST['correo'];
$telefono = $_POST['telefono'];
$documento = $_POST['documento'];
$direccion = $_POST['direccion'];
$pedido = $_POST['pedido'];
$pago = $_POST['metodo_pago'];

//Para base de datos
$clientedb = utf8_decode($cliente);
$maildb = utf8_decode($mail);
$direcciondb = utf8_decode($direccion);
$pedidodb = utf8_decode($pedido);

$con = new mysqli('localhost','p9000026_db','26390042Po','p9000026_db');
if($con->connect_error){
    die("Error en conexión con base de datos: \n". $con->connect_error);
} else{
}

$sql = "INSERT INTO enviodomicilio (documento, cliente, mail, telefono, direccion, pedido,metodo) VALUES ('$documento','$clientedb', '$maildb', '$telefono','$direcciondb','$pedidodb','$pago')";
if($con->query($sql) === true){
    $ultimoId = $con->insert_id;

    $headerCliente = 'From: envios@carlitos.com.ar' . " \r\n";
    $headerCliente .= "X-Mailer: PHP/" . phpversion() . " \r\n";
    $headerCliente .= "Mime-Version: 1.0 \r\n";
    $headerCliente .= "Content-Type: text/html;charset=utf-8";

    $mensajeCliente = "

    <!DOCTYPE html>
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
            <h1>Confirmación de pedido de Distribuidora Carlitos</h1><br>

            <p>Hola <b>" . $cliente . "</b>, le avisamos que su pedido número <b>" . $ultimoId. "</b> 
            ha sido confirmado, para enviar a " . $direccion . " con el método de pago de " . $pago . ". Le pedimos que por favor 
            tenga en cuenta que estamos teniendo demora en la entrega, y los días domingo no tenemos
            envíos disponible.</p><br>

            <p>Te pedimos que cualquier consulta que quieras agregar escribas a 
            nuestro whatsapp <b>+5491135523641</b>... pero pedimos que entiendan
            que estamos colapsados, estamos respondiendo pero con un porcentaje menor de rápidez.
            </p><br>

            <p> Siguenos en nuestras redes sociales <a href='https://www.instagram.com/distcarlitos/'><b>@distcarlitos</b></a> y participa 
            en nuestros concursos semanales, tenemos descuentos y muchos premios para vos.
            </p> <br>

            <p class='hashtag'><b>#seamosresponsables #quedateencasa</b></p>
        </div>
        
    </body>
    </html>

    ";


    $para = 'envios@carlitos.com.ar';
    $asunto = '[ENVIO A DOMICILIO] - ' .$documento . ' / ' .$cliente;
    $asuntoCliente = '[Confirmación de pedido] - ' .$documento . ' / ' .$cliente;
    
    mail($mail, $asuntoCliente, utf8_decode($mensajeCliente), $headerCliente);


} else {
    echo "Error en conexión con base de datos: <br>" . $sql . "<br>" . $con->error;
}

$con->close();

header("Location:success.html");


?>