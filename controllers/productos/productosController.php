<?php

class ProductosController
{

    public static function getProductosControllers()
    {

        $respuesta = ProductosModel::getProductoModel('matricula');

        return $respuesta;
    }

    public function registroProductosController()
    {

        if (isset($_POST['agragarpro'])) {

            $datosController = array(
                'idCliente' => $_POST['idCliente'],
                'precioProducto' => $_POST['precioProducto'],
                'idMembresia' => $_POST['idMembresia'],
                'idAdmin' => $_POST['idAdmin'],
                'fechaInicio' => date('Y-m-d ', strtotime($_POST['fechaInicio'])),
                'fechaFin' => date('Y-m-d ', strtotime($_POST['fechaFin'])),
                'fechaMatricula' => date('Y-m-d ', strtotime($_POST['fechaMatricula'])),
            );

            $respuesta = ProductosModel::registroProductoModel($datosController, 'matricula');

            if ($respuesta == 'success') {
                header('location:okProductos');
            } else {
                header('location:membresias');

            }
        }

    }

    //
    // INVENTARIO
    //
    public function validarProductoController($validarProducto)
    {
        $datosController = $validarProducto;
        $respuesta = ProductosModel::validarProductoModel($datosController, 'matricula');
        if ($respuesta) {
            echo 1;
        } else {
            echo 0;
        }
    }

    public function deleteProductosController()
    {
        if (isset($_GET['idProd'])) {
            $idProd = $_GET['idProd'];

            $respuesta = ProductosModel::deleteProductosModel($idProd, 'matricula');

            if ($respuesta == 'success') {
                header('location:okProdDelete');
            }

        }
    }

    public static function editarProductosController()
    {
        $datosController = $_GET['idProEdit'];

        $respuesta = ProductosModel::editarProductosModel($datosController, 'matricula');
        return $respuesta;

    }

    public function actualizarProductosController()
    {

        if (isset($_POST['editarProd'])) {
            $datosController = array(
                'fechaInicio' => date('Y-m-d ', strtotime($_POST['fechaInicio'])),
                'fechaFin' => date('Y-m-d ', strtotime($_POST['fechaFin'])),
                'idCliente' => $_POST['idCliente'],
                'idAdmin' => $_POST['idAdmin'],
                'precioProducto' => $_POST['precioProducto'],
                'idMembresia' => $_POST['idMembresia'],
                'idMatricula' => $_POST['idMatricula'],
            );

            $respuesta = ProductosModel::actualizarProductosModel($datosController, 'matricula');

            if ($respuesta == 'success') {

                header('location:editadoProd');
            }
        }
    }

}
