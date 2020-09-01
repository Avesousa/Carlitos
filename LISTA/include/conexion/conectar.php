

<?php
    $con = new mysqli('localhost','avesousa','26390042Po','mercadodelqueso');
    $statusConexion = false;
    if($con->connect_error){
        $statusConexion = false;
    } else {
        $statusConexion = true;
    }
?>