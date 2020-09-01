<?php
    $mensajeCliente = "
    <!DOCTYPE html>
    <html lang='es'>
    <head>
        <meta http-equiv='Content-type' content='text/html; charset=utf-8' />
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Confirmació de pedido</title>
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
                display: block;
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
                width: 100%;
                margin: auto;
                display: block;
            }
            .cliente{
                padding: 5%;
                padding-top: 1%;
                margin-top: 8%;
            }

            .cliente h1{
                text-align: center;
                color: #14d6d6;
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
                        <img src='../image/logo.svg' alt='Logo de distribuidora carlitos'>
                    </li>
                </ul>
            </nav>
        </header>
        <div class='cliente'>
            <h1>Confirmación de pedido</h1><br>

            <p>Hola <b>" . $cliente . "</b>, le avisamos que su pedido con el número <b>" . $ultimoId. "</b> 
            ha sido confirmado y generado, para enviar a " . $direccion . ".  Debido a la demanda estamos teniendo
            una demora significativa a responder nuestros mensajes pero pedimos paciencia.</p><br>

            <p>De igual forma, cualquier consulta que desees realizar escribas a 
            nuestro whatsapp <b>+5491126303385</b>... pero pedimos que entiendan
            que estamos colapsados, estamos respondiendo pero con un porcentaje menor de rápidez.
            </p><br>

            <p> Siguenos en nuestras redes sociales <a href='https://www.instagram.com/mercadodelqueso/'><b>@mercadodelqueso</b></a> y participa 
            en nuestros concursos semanales, diarios y todo lo que tenemos para vos.
            </p> <br>

            <p class='hashtag'><b>#seamosresponsables #quedateencasa</b></p>
        </div>
        
    </body>
    </html>
    ";
?>
