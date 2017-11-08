<?php session_start();
if (!$_SESSION["nombreAdmin"]) {
    header("location:ingreso");exit();
}
?>
<section class="jumbotron text-center" style="background-color: transparent; margin-bottom: 0px;">
    <div class="container">
        <h1 class="jumbotron-heading">Matricula</h1>
        <p class="lead text-muted">Aquí podras gestionar la matricula del cliente a una membresia.</p>
        <p>
            <a href="clientes" class="btn btn-primary">Lista de Matriculas</a>
            <a href="agragarclientes" class="btn btn-secondary">Agregar nueva matricula</a>
        </p>
    </div>
</section>
<ol class="breadcrumb">
    <li class="breadcrumb-item active">
        Sección de Matriculas
    </li>
</ol>

<?php if (isset($_GET['action'])) {

    if ($_GET['action'] == 'editadoProd') {
        echo '
<div id="oks" class="alert alert-success alert-dismissible fade show" role="alert">
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">
        &times;
    </span>
</button>
<strong>
    Enorabuena!
</strong>
El Producto fue Editado correctamente al Sistema.
</div>
';
        echo "  <META HTTP-EQUIV='Refresh' CONTENT='4; URL=productos'/> ";
    }
    if ($_GET['action'] == 'okInventarios') {
        echo '<div id="oks"  class="alert alert-success alert-dismissible fade show" role="alert">
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">
        &times;
    </span>
</button>
<strong>
    Enorabuena!
</strong>
El Inventario fue agregado correctamente al sistema.
</div>
';
        echo "  <META HTTP-EQUIV='Refresh' CONTENT='4; URL=inventario'/> ";
    }
    if ($_GET['action'] == 'okProductos') {
        echo '<div id="oks"  class="alert alert-success alert-dismissible fade show" role="alert">
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">
        &times;
    </span>
</button>
<strong>
    Enorabuena!
</strong>
El Producto fue agregado correctamente al sistema.
</div>
';
        echo "  <META HTTP-EQUIV='Refresh' CONTENT='4; URL=productos'/> ";
    }
    if ($_GET['action'] == 'okProdDelete') {
        echo '
<div id="oks" class="alert alert-warning alert-dismissible fade show" role="alert">
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">
        &times;
    </span>
</button>
<strong>
    Enorabuena!
</strong>
La matrícula fue borrada correctamente del sistema.
</div>
';
        echo "  <META HTTP-EQUIV='Refresh' CONTENT='4; URL=productos'/> ";
    }
}
?>
<div class="row">
<div class="col-md-2">
    <div class="list-group">
        <a href="productos"  class="list-group-item">
            <i  class="fa fa-list"></i> Listado
        </a>
        <a href="agragarproductos" class="list-group-item">
           <i  class="fa fa-edit"></i>  Nuevos
        </a>
        <!--a href="inventario" class="list-group-item">
           <i class="fa fa-stack-overflow" aria-hidden="true"></i> Inventario
        </a-->
    </div>
</div>
<div class="col-md-10">
    <div class="card">
        <div class="card-block">
            <?php if (isset($_GET['action'])): ?>
            <?php if ($_GET['action'] == 'productos' or $_GET['action'] == 'okProductos' or $_GET['action'] == 'okProdDelete' or $_GET['action'] == 'editarProd' or $_GET['action'] == 'editadoProd'): ?>
             <i class="fa fa-list"></i>  <h1 class="alert alert-warning text-center">
             <i class="fa fa-list"></i>  Listado de Matrículas
            </h1>
            <table class="table table-bordered table-sm" id="tablas">
                <thead class="badge-primary text-white">
                    <tr>
                        <td>
                            Nombre Cliente
                        </td>
                        <td>
                            Tipo Membresia
                        </td>
                        <td>
                            Precio<span class="text-danger">(*)</span>
                        </td>
                        <td>
                            Fecha Inicio
                        </td>
                        <td>
                            Fecha Fin
                        </td>
                        <td>
                            Acciones
                        </td>
                    </tr>
                </thead>
                <?php $get = ProductosController::getProductosControllers();?>
                <?php foreach ($get as $key):
                ?>
                <tr>
                    <td class='tooltips' data-toggle='tooltip' data-placement='top' title='id Producto :<?php echo $key['idMatricula'] ?>'  >
                        <?php echo $key['nombreCliente'] ?>
                    </td>
                    <td>
                        <?php echo $key['nombreMembresia'] ?>
                    </td>
                    <td>
                        $
                        <?php echo $key['costoMembresia'] ?>
                    </td>
                    <td>
                        <?php echo date("d/m/Y", strtotime($key['fechaInicio'])) ?>
                    </td>
                     <td align="center">
                        <?php echo date("d/m/Y", strtotime($key['fechaFin'])) ?>
                    </td>
                    <td align="center">
                        <a href="index.php?action=editarProd&idProEdit=<?php echo $key['idMatricula'] ?> ">
                            <i class="fa fa-edit btn btn-outline-primary btn-sm">
                            </i>
                        </a>
                        <a href="index.php?action=productos&idProd=<?php echo $key['idMatricula'] ?> ">
                            <i class="fa fa-trash  btn btn-outline-danger btn-sm">
                            </i>
                        </a>
                    </td>
                </tr>
                <?php endforeach?>
            </table>
        </div>
    </div>
</div>
<span class="text-danger">(*) <small>Es el Precio de Compra.</small></span>
<?php endif?>
<!-- Formulario de registro de los productos -->
<!-- ========================================== -->
<?php if ($_GET['action'] == 'agragarproductos'): ?>
<h1 class="alert alert-warning text-center">
    Nueva Matrícula
</h1>
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
            <div class="form-group">
                <label for="nombreCategorias">
                    Nombre Cliente
                </label>
                <select style="width:356px;"  class="chosen-select" id="idClienteNuevo" name="idCliente">
                    <option>
                        Elegir Cliente
                    </option>
                    <?php $b = new ClientesController();
                        $b->getClientesSelectController();
                    ?>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="nombreCategorias">
                    Membresia
                </label>
                <select style="width:356px;"  class="chosen-select"  name="idMembresia">
                    <option>
                        Elegir Membresia
                    </option>
                    <?php $a = new membresiasController;
                    $a->getMembresiasSelectController();?>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group" id="form">
                <div class="form-group">
                    <label for="exampleInputPassword1">Fecha de Inicio</label>
                    <input readonly type="text" name="fechaInicio" class="form-control datepicker" placeholder="Ingrese fecha de inicio" data-validacion-tipo="requerido" />
                </div>
            </div>
            <span id="pro">
            </span>
        </div>
        <div class="col-md-6">
            <div class="form-group" id="form">
                <div class="form-group">
                    <label for="exampleInputPassword1">Fecha de Fin</label>
                    <input readonly type="text" name="fechaFin" class="form-control datepicker" placeholder="Ingrese fecha de fin" data-validacion-tipo="requerido" />
                </div>
            </div>
            <span id="pro">
            </span>
        </div>
        <div class="center">
            <input type="hidden" id="idAdmin" name="idAdmin" value="1"/>
            <input type="hidden" id="fechaMatricula" name="fechaMatricula" value="<?php echo date('Y-m-d'); ?> "/>
            <input type="submit" name="agragarpro" id="button" value="Guardar Matrícula" class="btn btn-outline-danger"/>
        </div>
    </form>
</div>
<?php endif?>
<!--  -->

<?php endif?>
<?php
$re = new ProductosController();
$re->registroProductosController();
$re->deleteProductosController();
$re->actualizarProductosController();
?>
