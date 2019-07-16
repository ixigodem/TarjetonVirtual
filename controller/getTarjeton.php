<?php 
    include_once('../model/Data.php');
    include_once('../model/Tarjeton.php');
    include_once('../model/Conexion.php');

    header('Content-Type: application/json');

    $id = $_GET["id"];

    $tarjeton = array();

    $d = new Data();

    $tarjeton = $d->getTarjeton($id);

    echo json_encode($tarjeton);
?>