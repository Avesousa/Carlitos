<?php

$cliente = $_POST['cliente'];
$mail = $_POST['correo'];
$telefono = $_POST['telefono'];
$documento = $_POST['documento'];
$direccion = $_POST['direccion'];
$pedido = $_POST['pedido'];

//Para base de datos
$clientedb = utf8_decode($cliente);
$maildb = utf8_decode($mail);
$direcciondb = utf8_decode($direccion);
$pedidodb = utf8_decode($pedido);

include './include/conexion/conectar.php';

if($con->connect_error){
    die("Error en conexión con base de datos: \n". $con->connect_error);
} else{
}

$sql = "INSERT INTO enviodomicilio (documento, cliente, mail, telefono, direccion, pedido) VALUES ('$documento','$clientedb', '$maildb', '$telefono','$direcciondb','$pedidodb')";
if($con->query($sql) === true){
    $ultimoId = $con->insert_id;

    include './include/conexion/headerMail.php';
    include './include/correo/confirmacion.php';

    $asuntoCliente = '[Confirmación de pedido] - ' .$documento . ' / ' .$cliente;
    
    include './include/conexion/sendMail.php';


} else {
    echo "Error en conexión con base de datos: <br>" . $sql . "<br>" . $con->error;
}

$con->close();

header("Location:success.html");


?>