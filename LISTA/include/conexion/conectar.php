<?php
    $con = new mysqli('localhost','avesousa','26390042Po','mercadodelqueso');
    if($con->connect_error){
        echo "Conection error";
    } else {
        echo "Success conection";
    }
?>