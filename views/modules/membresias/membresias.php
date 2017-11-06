<?php

session_start();

if (!$_SESSION["nombreAdmin"]) {

    header("location:ingreso");

    exit();

}

?>
<ol class="breadcrumb">
    <li class="breadcrumb-item active">
        Sección de Membresias
    </li>
</ol>
<?php
if (isset($_GET['action'])) {
    if ($_GET['action'] == 'okMembresias') {
        echo '<div id="oks" class="alert alert-success alert-dismissible fade show" role="alert">
<button aria-label="Close" class="close" data-dismiss="alert" type="button">
    <span aria-hidden="true">
        ×
    </span>
</button>
<strong>
    Enorabuena!
</strong>
La membresia fue agregada correctamente.
</div>';
        echo '<meta http-equiv="Refresh" content="4;URL = membresias" >';
    }
    if ($_GET['action'] == 'editadoCat') {
        echo '
    <div class="alert alert-success alert-dismissible fade show" id="oks" role="alert">
        <button aria-label="Close" class="close" data-dismiss="alert" type="button">
            <span aria-hidden="true">
                ×
            </span>
        </button>
        <strong>
            Enorabuena!
        </strong>
        La membresia fue Editada correctamente al Sistema.
    </div>';
        echo '<meta content="4; URL = membresias" http-equiv="Refresh"> ';
    }
    if ($_GET['action'] == 'DeletMembresias') {
        echo '
        <div class="alert alert-warning alert-dismissible fade show" id="oks" role="alert">
            <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                <span aria-hidden="true">
                    ×
                </span>
            </button>
            <strong>
                Enorabuena!
            </strong>
            La membresia fue Borrada correctamente del sistema.
        </div>
        ';
        echo '
        <meta content="4;
        URL = membresias" http-equiv="Refresh">
            ';
    }
}
?>
            <div class="row">
                <div class="col-md-3">
                    <div class="list-group">
                        <a class="list-group-item" href="membresias">
                            <i class="fa fa-list-alt">
                            </i>
                            Listado Membresias
                        </a>
                        <a class="list-group-item" href="agragarMembresias">
                            <i class="fa fa-edit">
                            </i>
                            Membresias Nuevas
                        </a>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-block">
                            <?php if (isset($_GET['action'])): ?>
                            <?php if ($_GET['action'] == 'membresias' or $_GET['action'] == 'okMembresias' or $_GET['action'] == 'DeletMembresias' or $_GET['action'] == 'editarMem' or $_GET['action'] == 'editadoMem'): ?>
                            <h1 class="alert alert-warning text-center">
                                Listado de Membresias
                            </h1>
                            <table class="table table-striped table-sm" id="tablas">
                                <thead class="bg-primary text-white">
                                    <tr>
                                        <td>
                                            Id Membresia
                                        </td>
                                        <td>
                                            Nombre de Membresia
                                        </td>
                                        <td>
                                            Costo
                                        </td>
                                        <td>
                                            Acciones
                                        </td>
                                    </tr>
                                </thead>
<?php
$datos = new membresiasController();
$datos->getMembresiasController();
$datos->deleteMembresiaController();
?>
                            </table>
                            <?php endif?>
                            <?php if ($_GET['action'] == 'agragarMembresias'): ?>
                            <h1 class="alert alert-warning text-center">
                                Agregar Membresias
                            </h1>
                            <form method="post" onsubmit="return validarMembresias()">
                                <div class="form-group" id="form">
                                    <label for="nombreMembresias">
                                        Nombre de Membresia
                                    </label>
                                    <input class="form-control" id="nombreMembresias" name="nombreMembresia" placeholder="Nombre de Membresia" required="" type="text">
                                        <input name="" type="hidden">
                                            <span id="cat">
                                            </span>
                                        </input>
                                    </input>
                                    <label for="costoMembresia" style="padding-top: 10px;">
                                        Costo Membresia
                                    </label>
                                    <input class="form-control" id="costoMembresia" name="costoMembresia" placeholder="Costo de Membresia" required="" type="text">
                                </div>
                                <input class="btn btn-outline-danger btn-block" id="button" name="agragarMembresias" type="submit" value="Agregar Categorías">
                                </input>
                            </form>
                        </div>
                    </div>
                    <?php endif?>
                    <?php endif?>
                    <?php

$cat = new membresiasController();
$cat->agregarMembresiasController();

?>
                </div>
            </div>
