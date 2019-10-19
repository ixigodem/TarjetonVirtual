<?php
    include_once('../model/Data.php');
    include_once('../model/Tarjeton.php');
    include_once('../model/Conexion.php');

    header('Content-Type: application/json');

    // $id = $_GET["id"];
    $id = 1;
    $tarjeton = array();

    $d = new Data();

    $tarjeton = $d->getTarjeton($id);

    // print_r($tarjeton);

    // $newTarjeton = array_values(array_unique($tarjeton, SORT_REGULAR));
    echo json_encode($tarjeton);

    // var_dump($newTarjeton);
?>