<!-- Modal Editar Matriculas -->

<div class="modal fade bd-example-modal-lg" id="editarMatr" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Matrícula <?php echo $key['nombreCliente'] ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
<?php $editarMatr = MatriculasController::editarMatriculasController();?>
<?php foreach ($editarMatr as $key): ?>

		<form method="post">
            <script type="text/javascript">
                $(document).ready(function(){
                    $(".datepicker").datepicker({
                        dateFormat: 'dd-mm-yy',
                        yearRange: '2017:2018',
                        changeYear: true,
                        changeMonth: true,
                        selectOtherMonths: true
                    });
                    // $(".datepicker-today").datepicker().datepicker("setDate", new Date());
                    // $(".fechaInicio").change(function(){
                    //     var x = $(".fechaInicio").val();
                    //     var y = $("#fechaFin").val();
                    //     var f1 = new Date(x).valueOf();
                    //     var f2 = new Date(y).valueOf();
                    //     var res = f2 - f1;
                    //     // console.log(f1);
                    //     // console.log(f2);
                    //     console.log(res);
                    //     if(Date.parse(x) < Date.parse(y)){
                    //         console.log('primero');
                    //     }else{
                    //         console.log('segundo');
                    //     }

                    // });
                    // 
                    $("#fechaFin").change(function(){
                        var fechafin = $(this).val();
                        var datefecha = new Date(fechafin);
                        var fechahoy1 = new Date('12-12-2014');
                        var fechahoy2 = new Date('2014-12-12');
                        console.log(fechafin);
                        console.log(datefecha);
                        // console.log(fechahoy1);  
                        // console.log(fechahoy2); 
                    });
                });
            </script>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group" id="form">
                <div class="form-group">
                    <label for="exampleInputPassword1">Fecha de Inicio</label>
                    <input readonly type="text" name="fechaInicio" value="<?php echo date("d-m-Y", strtotime($key['fechaInicio'])) ?>" class="form-control datepicker fechaInicio">
                </div>
            </div>
            <span id="pro">
            </span>
        </div>
        <div class="col-md-12">
            <div class="form-group" id="form">
                <div class="form-group">
                    <label for="exampleInputPassword1">Fecha de Fin</label>
                    <input readonly type="text" id="fechaFin" name="fechaFin" value="<?php echo date("d-m-Y", strtotime($key['fechaFin'])) ?>" class="form-control datepicker fechaFin"/>
                </div>
            </div>
            <span id="pro">
            </span>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label for="nombreMembresia">
                    Tipo de Membresía
                </label>
                <select  class="form-control"  name="idMembresia">
                    <option value="<?php echo $key['idMembresia'] ?>"><?php echo $key['nombreMembresia'] ?></option>
                    <?php $mem = membresiasController::getMembresiasSelectController(); ?>
                    <?php foreach ($mem as $key): ?>
                    <option value=" <?php echo $key['idMembresia'] ?> ">
                        <?php echo $key['nombreMembresia']; ?>
                    </option>
                    <?php endforeach?>
                </select>
            </div>
        </div>
        <input type="hidden" name="idMatricula" value="<?php echo $key['idMatricula'] ?>">
        <input type="hidden" name="idCliente" value="<?php echo $key['idCliente'] ?>">
        <input type="hidden" name="idAdmin" value="<?php echo $key['idAdmin'] ?>">
        
    </div> 
    <div class="modal-footer">
            <input type="submit" name="editarProd" id="button" value="Guardar matricula" class="btn btn-primary"/>
            <button type="button" class="btn btn-danger " data-dismiss="modal">Salir</button>
        </div>
    </form>

       
      
    </div>
  </div>
</div>
<?php endforeach?>
