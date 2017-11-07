<!-- Modal -->
<div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="editarMem" role="dialog" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    <i class="fa fa-edit">
                    </i>
                    Editar Membresia
                </h5>
                <span aria-hidden="true">
                    ×
                </span>
            </div>
 <div class="modal-body">
    <form method="post">
        <?php $mem = membresiasController::editarMembresiaController();?>
         <div class="form-group">
            <label for="recipient-name" class="form-control-label">Nombre Usuario:</label>
          <?php foreach ($mem as $resp): ?>
            <input type="text" class="form-control" id="recipient-name" name="nombreMembresia" value=" <?php echo $resp['nombreMembresia'] ?> ">
            <label for="recipient-name" class="form-control-label" style="padding-top: 10px;">Costo Membresia:</label>
            <input type="text" class="form-control" id="recipient-name" name="costoMembresia" value=" <?php echo $resp['costoMembresia'] ?> ">
          </div>
            <input type="hidden" name="idMembresia" value="<?php echo $resp['idMembresia']; ?>">
          <?php endforeach?>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary" name="editarMem">Editar Membresia</button>
        </div>
    </form>
        </div>
 </div>
    </div>
</div>
<?php

$actualizarMem = new membresiasController();
$actualizarMem->actualizarMembresiaController();

?>
