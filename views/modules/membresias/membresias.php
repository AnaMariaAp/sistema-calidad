<?php

session_start();

if (!$_SESSION["nombreAdmin"]) {

    header("location:ingreso");

    exit();

}

?>
<section class="jumbotron text-center" style="background-color: transparent;">
    <div class="container">
        <h1 class="jumbotron-heading">Membresias</h1>
        <p class="lead text-muted">Aquí podras gestionar los tipos de membresias y los costos de cada uno, de igual manera crear nuevas membresias.</p>
        <p>
            <a href="membresias" class="btn btn-primary">Lista de Membresias</a>
            <a href="agragarMembresias" class="btn btn-secondary">Crear una membresia</a>
        </p>
    </div>
</section>

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
    if ($_GET['action'] == 'editadoMem') {
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
                <div class="card col-lg-12">
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
                                        <span id="mem">
                                        </span>
                                    </input>
                                </input>
                                <label for="costoMembresia" style="padding-top: 10px;">
                                    Costo Membresia
                                </label>
                                <input class="form-control" id="costoMembresia" name="costoMembresia" placeholder="Costo de Membresia" required="" type="text">
                            </div>
                            <input class="btn btn-outline-danger btn-block" id="button" name="agragarMembresias" type="submit" value="Agregar Membresias">
                            </input>
                        </form>
                    </div>
                </div>
                <?php endif?>
                <?php endif?>
                <?php
                    $mem = new membresiasController();
                    $mem->agregarMembresiasController();
                ?>

            </div>
