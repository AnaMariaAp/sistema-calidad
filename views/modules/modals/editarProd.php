<!-- Modal Editar Productos -->

<div class="modal fade bd-example-modal-lg" id="editarProd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Matrícula <?php echo $key['nombreCliente'] ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
<?php $editarProd = ProductosController::editarProductosController();?>
<?php foreach ($editarProd as $key): ?>

		<form method="post">
            <script type="text/javascript">
                $(document).ready(function(){
                    $(".datepicker").datepicker({
                        dateFormat: 'dd/mm/yy',
                        yearRange: '1990:2050',
                        changeYear: true
                    }); 
                })
            </script>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group" id="form">
                <div class="form-group">
                    <label for="exampleInputPassword1">Fecha de Inicio</label>
                    <input readonly type="text" name="fechaInicio" value="<?php echo date("d/m/Y", strtotime($key['fechaInicio'])) ?>" class="form-control datepicker" placeholder="Ingrese fecha de inicio" data-validacion-tipo="requerido" />
                </div>
            </div>
            <span id="pro">
            </span>
        </div>
        <div class="col-md-6">
            <div class="form-group" id="form">
                <div class="form-group">
                    <label for="exampleInputPassword1">Fecha de Fin</label>
                    <input readonly type="text" name="fechaFin" value="<?php echo date("d/m/Y", strtotime($key['fechaFin'])) ?>" class="form-control datepicker" placeholder="Ingrese fecha de fin" data-validacion-tipo="requerido" />
                </div>
            </div>
            <span id="pro">
            </span>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="nombreMembresia">
                    Tipo de Membresía
                </label>
                <select  class="form-control"  name="idMembresia">
                       <option value="<?php echo $key['idMembresia'] ?>"><?php echo $key['nombreMembresia'] ?></option>
                    <?php $a = new membresiasController;
                        $a->getMembresiasSelectController();
                    ?>
                </select>
            </div>
        </div>
        <input type="hidden" name="idMatricula" value="<?php echo $key['idMatricula'] ?>">
        <input type="hidden" name="idCliente" value="<?php echo $key['idCliente'] ?>">
        <input type="hidden" name="idAdmin" value="<?php echo $key['idAdmin'] ?>">
    </form>

       </div>
      <div class="modal-footer">
        <input type="submit" name="editarProd" id="button" value="Editar" class="btn btn-outline-danger"/>
        <button type="button" class="btn btn-outline-secondary " data-dismiss="modal">Salir</button>
      </div>
    </div>
  </div>
</div>
<?php endforeach?>
