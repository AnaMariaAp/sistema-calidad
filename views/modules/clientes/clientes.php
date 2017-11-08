<?php session_start();
if (!$_SESSION["nombreAdmin"]) {
    header("location:ingreso");exit();
}
?>
<section class="jumbotron text-center" style="background-color: transparent; margin-bottom: 0px;">
    <div class="container">
        <h1 class="jumbotron-heading">Clientes</h1>
        <p class="lead text-muted">Aquí podras gestionar los clientes como edicion de informacion y busqueda del mismo.</p>
        <p>
            <a href="clientes" class="btn btn-primary">Lista de Clientes</a>
            <a href="agragarclientes" class="btn btn-secondary">Agregar cliente nuevo</a>
        </p>
    </div>
</section>
<div class="album text-muted">
      <div class="container">
<?php
if (isset($_GET['action'])) {
    if ($_GET['action'] == 'okClientes') {
        echo '<div id="oks" class="alert alert-success alert-dismissible fade show" role="alert">
<button aria-label="Close" class="close" data-dismiss="alert" type="button">
    <span aria-hidden="true">
        ×
    </span>
</button>
<strong>
    Enorabuena!
</strong>
El Cliente fue agregado correctamente.
</div>';
        echo '<meta http-equiv="Refresh" content="4;URL = clientes" >';
    }
    if ($_GET['action'] == 'alta') {
        echo '<div id="oks" class="alert alert-success alert-dismissible fade show" role="alert">
<button aria-label="Close" class="close" data-dismiss="alert" type="button">
    <span aria-hidden="true">
        ×
    </span>
</button>
<strong>
    Enorabuena!
</strong>
El Cliente fue dado de alta correctamente al sistema.
</div>';
        echo '<meta http-equiv="Refresh" content="4;URL = clientes" >';
    }

    if ($_GET['action'] == 'okClientesEdit') {
        echo '<div id="oks" class="alert alert-success alert-dismissible fade show" role="alert">
<button aria-label="Close" class="close" data-dismiss="alert" type="button">
    <span aria-hidden="true">
        ×
    </span>
</button>
<strong>
    Enorabuena!
</strong>
El Cliente fue editado correctamente.
</div>';
        echo '<meta http-equiv="Refresh" content="4;URL = clientes" >';
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
        La Categoria fue Editada correctamente al Sistema.
    </div>';
        echo '<meta content="4; URL = clientes" http-equiv="Refresh"> ';
    }
    if ($_GET['action'] == 'baja') {
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
            El cliente fue dado de baja correctamente del sistema.
        </div>
        ';
        echo '
        <meta content="4;
        URL = clientes" http-equiv="Refresh">
            ';
    }
}
?>
<!-- Comiensa clientes list -->

            <?php if (isset($_GET['action'])): ?>
            <?php if ($_GET['action'] == 'clientes' or $_GET['action'] == 'okClientes' or $_GET['action'] == 'baja' or $_GET['action'] == 'alta' or $_GET['action'] == 'verClientes' or $_GET['action'] == 'okClientesEdit'): ?>
                <div class="jumbotron text-center" style="padding: 1rem 2rem;">
                    <h1>Lista de Clientes</h1>
                </div>
                <?php
                    $cli = ClientesController::getClientesController();
                ?>
                <table class="table table-striped table-sm" id="tablas">
                    <thead class="bg-primary text-white">
                        <tr>
                            <td>Nombre</td>
                            <td>Apellido</td>
                            <td>Teléfono</td>
                            <td>Ver </td>
                        </tr>
                    </thead>
                    <?php foreach ($cli as $key): ?>
                        <tr>
                            <td class="text-lg-center"><?php echo $key['nombreCliente'] ?></td>
                            <td class="text-lg-center"><?php echo $key['apellidoCliente'] ?></td>
                            <td class="text-lg-center"><?php echo $key['telefono'] ?></td>
                            <td class="text-lg-center"><a href="index.php?action=verClientes&idCliente=<?php echo $key['idCliente'] ?>"> <i class="fa fa-eye"></i></a></td>
                        </tr>
                    <?php endforeach?>
                </table>
                <?php endif?>
                <?php if ($_GET['action'] == 'agragarclientes'): ?>
                    <div class="jumbotron text-center" style="padding: 1rem 2rem;">
                        <h1>Agregar Clientes</h1>
                    </div>
                    <form method="post" onsubmit="return validarclientes()">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="nombreCliente">Nombre</label>
                                    <input type="text" class="form-control" id="nombreCliente" placeholder="Nombre Cliente" name="nombreCliente" required="">
                                  </div>
                            </div>
                            <div class="col-md-4">
                               <div class="form-group">
                                <label for="exampleInputPassword1">Apellido</label>
                                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Apellido Cliente" name="apellidoCliente" required="">
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label for="exampleInputPassword1">Provincia</label>
                                 <select class="chosen-select" id="exampleSelect1" style="width:239px;" name="idProvincia">
                                 <?php $pro = ProveedoresController::getProvinciaController();?>
                                 <?php foreach ($pro as $key): ?>

                                  <option value="<?php echo $key['idProvincia'] ?>"><?php echo $key['nombreProvincia']; ?></option>
                                 <?php endforeach?>
                                </select>
                              </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                              <div class="form-group">
                                <label for="exampleInputPassword1">Nombre Usuario</label>
                                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Nombre Usuario" name="usuarioCliente" required="">
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label for="emailCliente">Email</label>
                                <input type="text" class="form-control" id="emailCliente" placeholder="Email" name="emailCliente" required="">
                              </div>
                            </div>
                        <div class="col-md-4">
                              <div class="form-group">
                                <label for="exampleInputPassword1">Ciudad</label>
                                <select class="chosen-select" id="exampleSelect1" style="width:239px;" name="idCiudad">
                                 <?php $prov = ProveedoresController::getCiudadController();?>
                                 <?php foreach ($prov as $row): ?>

                                  <option value="<?php echo $row['idCiudad'] ?>"><?php echo $row['nombreCiudad']; ?></option>
                                 <?php endforeach?>
                                </select>
                              </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                              <div class="form-group">
                                <label for="exampleInputPassword1">Dirección</label>
                                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Dirección" name="direccion" required="">
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label for="exampleInputPassword1">Contraseña Usuario</label>
                                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Contraseña Usuario" name="passwordCliente" required="">
                              </div>
                            </div>
                          <div class="col-md-4">
                              <div class="form-group">
                                <label for="exampleInputPassword1">Telefono</label>
                                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Telefono" name="telefono" required="">
                              </div>
                            </div>
                        </div>
                        <div class="row">
                         <div class="col-md-6">
                            <div class="form-group"  id="form">
                                <label for="exampleInputPassword1">DNI</label>
                            <input class="form-control" id="clientes"  name="dni" type="text" placeholder="DNI">
                            <span id="cli"></span>
                            </div>
                        </div>
                          <div class="col-md-6">
                          <div class="form-group">
                                <label for="exampleInputPassword1" class="label"></label>
                            <input class="btn btn-outline-danger btn-block" id="button" name="agragarclientes" type="submit" value="Agregar Cliente">
                        </div>
                        </div>
                        </div>
                    </form>
                </div>
            </div>
            <?php endif?>
            <?php endif?>

                    <!-- editar Clientes -->
                    <!-- editar Clientes -->
                    <!-- editar Clientes -->

            <?php if ($_GET['action'] == 'editClientes'): ?>
                <div class="jumbotron" style="padding: 1rem 2rem;">
                    <h1>Editar clientes</h1>
                </div>
                <?php $edit = ClientesController::editClientesController();?>
            <?php foreach ($edit as $value): ?>
            <?php endforeach?>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="nombreCliente">Nombre</label>
                            <input type="text" class="form-control" id="nombreCliente" name="nombreCliente" value="<?php echo $value['nombreCliente'] ?>">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="apellidoCliente">Apellido</label>
                            <input type="text" class="form-control" id="apellidoCliente" name="apellidoCliente"  value="<?php echo $value['apellidoCliente'] ?>">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="dni">DNI</label>
                            <input type="text" class="form-control" id="dni" name="dni" value="<?php echo $value['dni'] ?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="telefono">Telefono</label>
                            <input type="text" class="form-control" id="telefono" name="telefono" value="<?php echo $value['telefono'] ?>">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Sexo</label>
                            <select name="Sexo" class="form-control">
                                <!-- <option <?php echo $alm->Sexo == 1 ? 'selected' : ''; ?> value="1">Masculino</option>
                                <option <?php echo $alm->Sexo == 2 ? 'selected' : ''; ?> value="2">Femenino</option> -->
                                <option value="1">Masculino</option>
                                <option value="2">Femenino</option>
                            </select>
                        </div>
                        <!-- <div class="form-group">
                            <label for="exampleInputPassword1">Sexo</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" name="dni" value="">
                        </div> -->
                    </div>
                    <div class="col-md-4">
                        <script type="text/javascript">
                            $(document).ready(function(){
                                $(".datepicker").datepicker({
                                    dateFormat: 'dd-mm-yy',
                                    yearRange: '1950:2006',
                                    changeYear: true
                                }); 
                            })
                        </script>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Fecha de Nacimiento</label>
                            <input readonly type="text" name="FechaNacimiento" value="" class="form-control datepicker" placeholder="Ingrese su fecha de nacimiento" data-validacion-tipo="requerido" />
                            <!-- <input readonly type="text" name="FechaNacimiento" value="<?php echo $alm->FechaNacimiento; ?>" class="form-control datepicker" placeholder="Ingrese su fecha de nacimiento" data-validacion-tipo="requerido" /> -->
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="edad">Edad</label>
                            <input type="text" class="form-control" id="edad" name="edad" value="">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="direccion">Direccion</label>
                            <input type="text" class="form-control" id="direccion" name="direccion" value="">
                        </div>
                    </div>
                </div>
                <div class="jumbotron" style="padding: 1rem 2rem; margin-top: 2rem;">
                    <h1>Matricula</h1>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Tipo de Membresia</label>
                            <select name="Sexo" class="form-control">
                                <!-- <option <?php echo $alm->Sexo == 1 ? 'selected' : ''; ?> value="1">Masculino</option>
                                <option <?php echo $alm->Sexo == 2 ? 'selected' : ''; ?> value="2">Femenino</option> -->
                                <option value="1">Mem 1</option>
                                <option value="2">Mem 2</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Costo</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" name="dni" value="">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Fecha de Inicio</label>
                            <input readonly type="text" name="fechainicio" value="" class="form-control datepicker" placeholder="Ingrese fecha de inicio" data-validacion-tipo="requerido" />
                            <!-- <input readonly type="text" name="FechaNacimiento" value="<?php echo $alm->FechaNacimiento; ?>" class="form-control datepicker" placeholder="Ingrese su fecha de nacimiento" data-validacion-tipo="requerido" /> -->
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Fecha de Fin</label>
                            <input readonly type="text" name="fechafin" value="" class="form-control datepicker" placeholder="Ingrese fecha de termino" data-validacion-tipo="requerido" />
                            <!-- <input readonly type="text" name="FechaNacimiento" value="<?php echo $alm->FechaNacimiento; ?>" class="form-control datepicker" placeholder="Ingrese su fecha de nacimiento" data-validacion-tipo="requerido" /> -->
                        </div>
                    </div>
                </div> 
                <p>----------------------------------------------------------------------------------------------------------</p>
                <form method="post" onsubmit="return validarclientes()">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Nombre Cliente</label>
                                <input type="text" class="form-control" id="exampleInputPassword1" name="nombreCliente" value="<?php echo $value['nombreCliente'] ?>">
                              </div>
                        </div>
                        <div class="col-md-4">
                           <div class="form-group">
                            <label for="exampleInputPassword1">Apellido Cliente</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" name="apellidoCliente"  value="<?php echo $value['apellidoCliente'] ?>">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="exampleInputPassword1">Provincia</label>
                             <select class="chosen-select" id="exampleSelect1" style="width:239px;" name="idProvincia">
                             <?php $pro = ProveedoresController::getProvinciaController();?>

                              <option value="<?php echo $value['idProvincia'] ?>"><?php echo $value['nombreProvincia']; ?></option>
                             <?php foreach ($pro as $key): ?>
                              <option value="<?php echo $key['idProvincia'] ?>"><?php echo $key['nombreProvincia']; ?></option>
                             <?php endforeach?>
                            </select>
                          </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="exampleInputPassword1">Nombre Usuario</label>
                            <input type="text" class="form-control" id="exampleInputPassword1"  name="usuarioCliente" value="<?php echo $value['usuarioCliente'] ?>">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="emailCliente">Email</label>
                            <input type="text" class="form-control" id="emailCliente" name="emailCliente" value="<?php echo $value['emailCliente'] ?>">
                          </div>
                        </div>
                    <div class="col-md-4">
                          <div class="form-group">
                            <label for="exampleInputPassword1">Ciudad</label>
                            <select class="chosen-select" id="exampleSelect1" style="width:239px;" name="idCiudad">
                             <option value="<?php echo $value['idCiudad'] ?>"><?php echo $value['nombreCiudad']; ?></option>
                             <?php $prov = ProveedoresController::getCiudadController();?>
                             <?php foreach ($prov as $row): ?>
                              <option value="<?php echo $row['idCiudad'] ?>"><?php echo $row['nombreCiudad']; ?></option>
                             <?php endforeach?>
                            </select>
                          </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="exampleInputPassword1">Dirección</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" name="direccion" value="<?php echo $value['direccion'] ?>">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="exampleInputPassword1">Contraseña Usuario</label>
                            <input type="text" class="form-control" id="exampleInputPassword1"  name="passwordCliente" value="<?php echo $value['passwordCliente'] ?>">
                          </div>
                        </div>
                      <div class="col-md-4">
                          <div class="form-group">
                            <label for="exampleInputPassword1">Telefono</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" name="telefono" value="<?php echo $value['telefono'] ?>">
                          </div>
                        </div>
                    </div>
                    <div class="row">
                     <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputPassword1">DNI</label>
                        <input class="form-control"  name="dni" type="text" value="<?php echo $value['dni'] ?>">
                        </div>
                    </div>
                      <div class="col-md-6">
                      <div class="form-group">
                            <label for="exampleInputPassword1" class="label"></label>
                        <input class="btn btn-outline-danger btn-block" id="button" name="editarClientes" type="submit" value="Editar Cliente">
                    </div>
                    </div>
                    </div>
                    <input type="hidden" name="idCliente" value="<?php echo $value['idCliente'] ?>">
                </form>
            </div>
        </div>
        <?php endif?>

                    <?php

$reg = new ClientesController();
$reg->registrarClientesController();
$reg->editClientesController();
$reg->actualizarClientesController();
$reg->bajaClientesController();
$reg->altaClientesController();
?>
                </div>
            </div>
