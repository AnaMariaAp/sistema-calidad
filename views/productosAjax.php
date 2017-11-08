<?php

require_once '../models/conexion.php';

$clientenuevo = $_GET['clientenuevo'];

$sql = Conexion::conectar()->prepare("SELECT * FROM productos WHERE idCliente = '$clientenuevo' LIMIT 1");
if ($sql->execute()) {

    $prod = $sql->fetch(PDO::FETCH_OBJ);
    $prod->status = 200;
    $prod->clientenuevo = $clientenuevo;
    echo json_encode($prod);
}
