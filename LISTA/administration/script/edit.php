<?php
    $id = $_GET['id'];
    $con = new mysqli('localhost','p9000026_db','26390042Po','p9000026_db');
    $consulta = $con->query("SELECT * FROM enviodomicilio WHERE id = $id");
    if(!$consulta){
        echo "ERROR DE CONEXIÓN ".$con->error;
    }
    $result = $consulta->fetch_assoc();
    header('Content-Type: text/html; charset=UTF-8');
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
    <title>EDICIÓN DE PEDIDOS - Distribuidora Carlitos, S.A</title>
    <link rel="icon" href="../../image/favicon.png" type="image/png">
    <!-- Estilos -->
    <link rel="stylesheet" type="text/css" href="../../boot/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../../css/estilos.css">
    <link rel="stylesheet" href="../../css/estilosdescroll.css">
</head>
<body>

    <div class="container mt-2 mb-2">
        <div class="row">
            <div class="card container-fluid">
                <div class="card-body">
                    <h4 class="card-title">Pedido número: <?php echo $result['id']?></h5>
                    <h6 class="card-subtitle text-muted mb-2"><?php echo $result['cliente']. " DNI: ". $result['documento']?></h6>
                    <form action="acciones/update.php" method="POST">
                        <div class="form-group">
                            <input type="hidden" name="id" id="id" value="<?php echo $result['id']?>">
                            <input type="text" name="direccion" id="direccion" class="form-control" value="<?php echo $result['direccion']?>"><br>
                            <input type="number" name="telefono" id="telefono" class="form-control" value="<?php echo $result['telefono']?>"><br>
                            <textarea name="pedido" id="pedido" class="form-control editTextArea"><?php echo $result['pedido']?></textarea><br>
                            <input type="submit" value="Actualizar" class="form-control btn btn-success">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


</body>
</html>