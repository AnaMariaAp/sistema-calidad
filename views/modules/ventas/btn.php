 <a href="ventas" class="btn btn-outline-primary fa fa-plus-square" data-toggle="tooltip" data-placement="top" title="Continuar Comprando" ></a>
 <!--a href="index.php?action=cancelarVenta&idCancelar='yes'" class="btn btn-primary">Cancelar orden</a-->
 <input type="submit" name="enviarCancelar" id="enviarCancelar" data-toggle="modal" data-target="#cancelarVenta"  class="btn btn-primary" value="Cancelar  Venta" data-toggle="tooltip" data-placement="top" title="Cancelar venta">
<input type="hidden" name="idAdmin" value="<?php echo $_SESSION['idAdmin'] ?>">
<input type="submit" name="enviarDetalles" id="enviar"  class="btn btn-outline-danger" value="$ Finalizar  Venta" data-toggle="tooltip" data-placement="top" title="Vender!!">