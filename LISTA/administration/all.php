<?php 
    $con = new mysqli('localhost','p9000026_db','26390042Po','p9000026_db');
    $search = '';
    $max = 15;
    if(isset($_GET['search'])){
        $search = $_GET['search'];
    }
    $rowUnPrint = ($con->query("SELECT * FROM `enviodomicilio` WHERE `impreso` = 0 AND `disponible` = 1")->num_rows);
    $rowUnMotive = ($con->query("SELECT * FROM `enviodomicilio` WHERE `motivo` = '' AND `motivo` = ' ' AND `disponible` = 1")->num_rows);
    $all = "SELECT `id`,`documento`,`cliente`,`direccion`,`telefono`,`mail`,`creacion`,`monto` FROM `enviodomicilio` WHERE `disponible` = 1 ORDER BY id";
    $page_all = "SELECT * FROM enviodomicilio WHERE `disponible` = 1  ORDER BY id DESC";

    if(!empty($search)){
        $all = "SELECT `id`,`documento`,`cliente`,`direccion`,`telefono`,`mail`,`creacion`,`monto` 
                FROM `enviodomicilio` 
                WHERE (id LIKE '%$search%' OR documento LIKE '%$search%' OR cliente LIKE '%$search%' OR direccion LIKE '%$search%') AND `disponible` = 1
                ORDER BY id";
        $page_all = "SELECT `id`,`documento`,`cliente`,`direccion`,`telefono`,`mail`,`creacion`,`monto` 
                    FROM enviodomicilio 
                    WHERE (id LIKE '%$search%' OR documento LIKE '%$search%' OR cliente LIKE '%$search%' OR direccion LIKE '%$search%') AND `disponible` = 1
                    ORDER BY id DESC";
    }
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
    <title>Distribuidora Carlitos, S.A</title>
    <link rel="icon" href="../image/favicon.png" type="image/png">
    <!-- Estilos -->
    <link rel="stylesheet" type="text/css" href="../boot/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/estilos.css">
    <link rel="stylesheet" href="../css/estilosdescroll.css">
</head>
<body>
    <div id="adminNav" class="container-fluid scrollflow -slide-top -opacity">
        <div class="row">
            <div class="container">
                <div class="row">
                    <div class="col-2">
                        <a href="index.html">
                            <img class="adminLogomini" src="../image/logo.png" alt="Logo"/>
                        </a>
                    </div>
                    <div class="col-10">
                        <div class="row adminLink">
                            <a href="index.html"><h2>Administración</h2></a>
                            <a href="all.php"><h2>Todos los pedidos</h2></a>
                            <a href="unprint.php">
                                <h2>Pedidos sin imprimir 
                                    <?php 
                                        if($rowUnPrint > 0){
                                            echo "<span class='adminNotification'>".$rowUnPrint."</span>";
                                        }
                                    ?>
                                </h2></a>
                            <a href="unmotive.php">
                                <h2>Pedidos sin liquidar
                                    <?php 
                                        if($rowUnMotive > 0){
                                            echo "<span class='adminNotification'>".$rowUnMotive."</span>";
                                        }
                                    ?>
                                </h2></a>
                            <a href="ends.php"><h2>Pedidos finalizados</h2></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="all" class="container scrollflow -slide-top -opacity">
        <div class="row">
            <form action="all.php" method="get" class="adminSearch">
                <div class="form-group">
                    <input id="search" name="search" type="text" placeholder="¿Qué buscas?" 
                    value="<?php 
                        if(!empty($search)){
                            echo $search;
                        }else{
                            echo '';
                        }
                    
                    ?>">
                    <input type="submit" class="btn btn-info" value="Buscar">
                </div>
            </form>
        </div>
        <div class="row">

            <table class="table table-striped table-dark table-responsive">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>FECHA</th>
                        <th>DOCUMENTO</th>
                        <th>NOMBRE Y APELLIDO</th>
                        <th>DIRECCIÓN</th>
                        <th>INFORMACIÓN DE CONTACTO</th>
                        <th>MONTO COBRADO</th>
                        <th>ACCIÓN</th>
                    </tr>
                </thead>

                <?php
                    /* *SE REALIZA CONEXIÓN DE CONSULTA Y PAGINATION* */
                    $page = '';

                    if(isset($_GET["page"])){
                        $page = $_GET["page"];
                    }else{
                        $page = 1;
                    }

                    $start = ($page-1)*$max;
                    $all .= " DESC LIMIT $start, $max";
                    $result = $con->query($all);
                    if(!$result){
                ?>

                    <tbody>
                        <tr>
                            <td>ERROR DE CONSULTA</td>
                            <td> <?php echo $con->error ?> </td>
                        </tr>
                    </tbody>
                
                <?php
                    } else {
                        while($row = $result->fetch_assoc()){
                ?>

                    <tbody>
                        <tr>
                            <td><?php echo $row['id'] ?></td>
                            <td><?php echo $row['creacion'] ?></td>
                            <td><?php echo $row['documento'] ?></td>
                            <td><?php echo $row['cliente'] ?></td>
                            <td><?php echo $row['direccion'] ?></td>
                            <td><?php echo $row['telefono'] . " / " . $row['mail'] ?></td>
                            <td><?php echo $row['monto'] ?></td>
                            <td>
                                <button class="btn btn-success" onclick="accionar('print','<?php echo $row['id'] ?>')">IMPRIMIR</button>
                                <button class="btn btn-info" onclick="accionar('edit','<?php echo $row['id'] ?>')">EDITAR</button>
                                <button class="btn btn-danger" onclick="accionar('delete','<?php echo $row['id'] ?>')">ELIMINAR</button>
                                <button class="btn btn-dark" onclick="accionar('send','<?php echo $row['id'] ?>')">COBRAR</button>
                            </td>
                        </tr>
                    </tbody>

                <?php
                        }
                    }
                ?>

            </table> <br>
            <div class="container">
                <div class="row">
                    <div class="col-12 adminPagination">

                    <?php
                        $pagination = ceil(($con->query($page_all)->num_rows)/$max);
                        if($pagination > 1){
                            $loop = $page;
                            $dif = $pagination - $page;
                            if($dif <= 5){$loop = $pagination - 5;}
                            $loop_end = $loop + 4;
    
                            if($page > 1){
                                echo "<a class='adminPage' href='all.php?page=1&search=".$search."'>Primera</a>";
                                echo "<a class='adminPage' href='all.php?page=".($page - 1)."&search=".$search."'><<</a>";
                            }
                                echo "<a class='adminPage adminPageSelected' href='all.php?page=".$loop."&search=".$search."'>".$loop."</a>";
    
                            for($i=$loop+1; $i<=$loop_end; $i++){     
                                echo "<a class='adminPage' href='all.php?page=".$i."&search=".$search."'>".$i."</a>";
                            }
                            if($page <= $loop_end){
                                echo "<a class='adminPage' href='all.php?page=".($page + 1)."&search=".$search."'>>></a>";
                                echo "<a class='adminPage' href='all.php?page=".$pagination."&search=".$search."'>Última</a>";
                            }
                        } else{
                            echo "<a class='adminPage adminPageSelected' href='all.php?page=1&search=".$search."'>1</a>";
                        }
                    ?>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer id="contacto" class="container-fluid">
        <div class="row">
            <h1 class="col-12">Contacto</h1>
        </div>
        <div class="row">
            <div class="col-12 col-md-4">
                <p>Para más información detallada y en tiempo real,
                    ¡no dudes contactarnos en nuestras redes sociales, y
                    en los medios de comunicación directo!
                    
                </p>
                <div class="row">
                        <p class="col-12 col-lg-6">ventas@carlitos.com.ar</p>
                        <p class="col-12 col-lg-6">(+54)9 11 4751 6465</p>
                        <p class="col-12 col-lg-12">Misiones 6466, El Palomar</p>
                </div>
                <div class="row">
                    <span class="col-4 redesSociales">
                        <a href="https://www.facebook.com/distCarlitos/"><img src="image/redes/facebook.png" alt="facebook"></a>
                    </span>
                    <span class="col-4 redesSociales">
                        <a href="https://www.instagram.com/distcarlitos"><img src="image/redes/instagram.png" alt="instagram"></a>
                    </span>
                    <span class="col-4 redesSociales">
                        <a href="https://api.whatsapp.com/send?phone=+5491135523641&text=Distribuidora Carlitos, del campo a su mesa..."><img src="image/redes/whatsapp.png" alt="whatsapp"></a>
                    </span>
                </div>
            </div>
            <div class=" col-12 col-md-8">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3283.9530636169206!2d-58.59475988498617!3d-34.605348365090954!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bcb856c92a8f0f%3A0xf11fc07affb453a6!2sDistribuidora+Carlitos!5e0!3m2!1ses!2sar!4v1536780621552" width="600" height="300" frameborder="0" style="border:0" allowfullscreen class="mapa"></iframe>
            </div>

        </div>
        <span class="col-12">
            &copy; Todos los derechos reservados a Distribuidora Carlitos, S.A.
        </span>
    </footer>

    <div class="overlayPDF" id="adminOverlay">
        <div class="popupPDF" id="adminPopup">
            <span id="btn-cerrar-popup" class="btn-cerrar-popup">X</span>
            <iframe id="mostradorPdf" src="" style="width:90%; height:500px;" frameborder="0"></iframe>
        </div>
    </div>

    <!--Los script-->
    <script src="../scripts/jquery-3.4.1.min.js"></script>
    <script src="../scripts/jqueryLAZY.js"></script>
    <script src="../boot/js/bootstrap.min.js"></script>
    <script src="../scripts/script.js"></script>
    <script src="../scripts/eskju.jquery.scrollflow.min.js"></script>

</body>
</html>