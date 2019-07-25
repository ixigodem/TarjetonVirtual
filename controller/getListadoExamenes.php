<?php 
include_once('../model/Data.php');
include_once('../model/ListadoExamen.php');

$d = new Data();

$examenes = $d->getListadoExamen();

foreach ($examenes as $e) {
    echo json_encode($e);
}

// echo json_encode($examenes);
?>