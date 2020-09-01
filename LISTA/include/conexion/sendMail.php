<?php
    mail($mail, $asuntoCliente, utf8_decode($mensajeCliente), $headerCliente);
?>