<div class="modal fade bd-example-modal-lg" id="agregarInventario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar stock</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
<form method="post" >

            <div class="form-group">
                <label for="nombreCategorias" class=''>
                   Nombre Productos <small>(Opcinal)</small>
                </label>
                <select class="form-control" name="idProducto" id="idProducto">
                    <option>
                        Elegir Producto
                    </option>
                    <?php $a = ProductosController::getProductosControllers();?>
                    <?php foreach ($a as $key): ?>
                    <option value=" <?php echo $key['idProducto'] . ' / ' . $key['cantidadIngresada'] ?> ">
                        <?php echo $key['nombreProducto'] ?>
                    </option>
                    <?php endforeach?>
                </select>
            </div>

            <div class="form-group">
                <label for="cantidadIngresada" class="">
                    Cantidad de Unidades <small>(Obligatorio)</small>
                </label>
                <input type="number" class="form-control" id="cantidadIngresada" placeholder="Cantidad de Unidades"  name="cantidadIngresada" required=""/>
            </div>
            <div class="form-group">
                <label for="precioVenta" class="">
                    Precio de Venta <small>(Opcinal)</small>
                </label>
                <input type="text" class="form-control" id="precioVenta" placeholder="Precio de Venta"  name="precioVenta" />
            </div>
            <div class="form-group">
                <label for="precioVenta" class="text-primary">
<br>
                </label>
                
            </div>
            <div class="modal-footer">
                <input type="submit" class="btn btn-primary"  name="agregarInventario" value="Agregar Stock" />
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
            </div>
      </div>
</form>
    </div>
  </div>
</div>


