<!DOCTYPE html>
<html lang="en">
<?php
  include './include/head.php';
?>
<body>
  <?php
    include './include/componentes/header.php';
  ?>
  <div class="container-fluid  listaPdf">
    <div class="col-12">
      <div class="listado">
        <h1>Pedidos a domicilio - Mercado del queso</h1>
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
          <div class="pedido form-group">
            <br>
            <label for="pedido">Escribe tu pedido</label>
            <div class="form-group addItem">
              <div class="row">
                <div class="form-group col-2">
                  <label for="qty">CANT</label>
                  <input type="text" name="qty" id="qty" class="form-control">
                </div>
                <div class="form-group col-9">
                  <label for="desc">DESCRIPCIÓN</label>
                  <input type="text" name="desc" id="desc" class="form-control">
                </div>
                <div class="form-group col-1">
                  <label for="add">Agregar</label>
                  <a href="">+</a>
                </div>
              </div>
            </div>
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
  <!--Los script-->
  <?php
    include './include/javascript.php';
  ?>
</body>
</html>