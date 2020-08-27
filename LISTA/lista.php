<!DOCTYPE html>
<html lang="en">
<?php
  include './include/head.php';
?>
<body>
    <header>
        <nav>
          <ul id="menu">
            <li>
                <img src="image/logo.png" alt="Logo de distribuidora carlitos"/>
            </li>
          </ul>
        </nav>
    </header>
    <div class="container-fluid  listaPdf">
      <div class="col-12">
        <div class="listado">
          <h1>Envío a domicilio - Distribuidora Carlitos</h1>
          <p>Las lista de precio fueron deshabilitada por generar tanto errores en los pedidos</p> 
          <p>te solicitamos que hagas el pedido lo más claro posible de lo que se quiere,</p> 
          <p>y a su vez necesitamos que entienda que algunas marcas no las trabajamos y posiblemente enviaremos una similar en costo y calidad.</p>
          <hr>
          <p class="letrasXL">Debido a un problema de alta demanda de pedidos y también un recorte en el personal
          estamos recepcionando los pedidos en el horario de <b>07:00 a 14:00</b> y los pedidos que
          entren fuera del horario serán recepcionado el día siguiente.
          </p>
          <hr>
          <h2>Leer antes de realizar el pedido</h2>
          <p>Se le recuerda a nuestra distinguida clientela, que los envíos a domicilios se habilitarón para las personas
          con riesgo. <span class="resaltador">#SeamosResponsables</span>, pero de igual forma podés realizar tu pedido.
          </p>
          <p> 
            Para realizar un pedido debe visualizar por medio de la listas colocadas arriba la información del producto a
            comprar.
          </p>
          <p>
            Colocar información del producto tal cual aparece en la lista de precio, así evitaremos confunciones con respecto
            a su pedido.
          </p>
          <p>
            Verificar que los productos seleccionados tengan como monto mínimo 1000$ pesos argentinos, ya que, 
            de lo contrario se cancelará el envío. 
          </p>
          <p>
            Luego de enviado su pedido, vamos a confirmarlo por medio del correo o número de teléfono que nos facilite. Hasta no obtener una respuesta de su parte, el envío no se realiza.
          </p>
          <p>
            Tratar de realizar todo el pedido en un solo envío, y en caso de ser necesario sumar algún otro producto a la lista, deberá escribir al correo: envios@carlitos.com.ar 
            con el número de documento, dirección, y teléfono, y colocando lo que desea sumar. Le recordamos que debe hacerlo lo más pronto posible, porque posiblemente el envío ya se haya generado y pase a reparto, pudiendo traer incovenientes.
          </p>
          <p>
            Tener en cuenta que al recibir el pedido, debe entregarle al personal el dinero por la compra y el costo del remis,
            ya que el mismo no se encuentra incluído en el pedido. Por favor evitar contacto con el personal.
          </p>
          <p>Ayudanos a ayudarte <span class="resaltador">#quedateEnCasa #SeamosSolidarios</span> ...</p>
        </div>
        <div class="formularioEnvio">
          <form action="enviar.php" method="post">
            <div class="form-group">
              <input type="text" id="cliente" name="cliente" class="form-control" placeholder="Nombre y Apellido" required><br>
            </div>
            <div class="form-group">
              <input type="number" id="documento" name="documento" class="form-control" placeholder="Número de documento, cuil o cuit (SOLO NÚMEROS: 20254655874)" required><br>
            </div>
            <div class="form-group">
              <input type="number" id="telefono" name="telefono" class="form-control" placeholder="Teléfono (1154584563)" required><br>
            </div>
            <div class="form-group">
              <input type="email" id="correo" name="correo" class="form-control" placeholder="Correo Electrónico" required><br>
            </div>
            <div class="form-group">
              <input type="text" id="direccion" name="direccion" class="form-control" placeholder="Dirección" required><br>
            </div>
            <div class="form-group">
              <select name="metodo_pago" id="metodo_pago" class="form-control" placeholder="Forma de Pago">
                <option value="Efectivo">Efectivo</option>
                <option value="Transferencia">Transferencia</option>
                <option value="MercadoPago">Mercado Pago</option>
              </select>
            </div><br>
            <p style="font-style: italic;font-weight: 100;font-size: 0.9em;">
              El pago del remis debe ser unicamente en efectivo. En caso de realizar el pago por medio de 
              transferencia por favor colocar <b>número de cuil</b>, en vez de DNI así podemos generarle la factura.
            </p>
            <div class="form-group">
              <br>
              <label for="pedido">Escribe tu pedido</label>
              <div class="ejemplo">
                <p>Ejemplo para realizar el pedido</p>
                <p>1/4 de Jamón cocido intermedio campo austral</p>
                <p>1/4 de queso en barra Don Fortunato</p>
                <p>1 pack de leche la Veronica</p>
              </div>
              <textarea name="pedido" id="pedido" class="form-control pedido" placeholder="Describa su pedido, lo más claro posible, y con toda la información que figura en lista." required minlength="15"></textarea><br>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
          </form>
        </div>
      </div>
      <span class="col-12">
        &copy; Todos los derechos reservados a Distribuidora Carlitos, S.A.
        Servicio habilitado solo por las limitaciones de sanidad empleadas.
      </span>
    </div>
    <?php
      include './include/conexion/conectar.php';
    ?>
    <!--Los script-->
    <script src="scripts/jquery-3.4.1.min.js"></script>
    <script src="scripts/jqueryLAZY.js"></script>
    <script src="boot/js/bootstrap.min.js"></script>
    <script src="scripts/script.js"></script>
    <script src="scripts/eskju.jquery.scrollflow.min.js"></script>
</body>
</html>