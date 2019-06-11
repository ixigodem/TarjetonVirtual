<?php 
include_once('../model/Data.php');
include_once('../model/ListadoExamen.php');

$d = new Data();

$examenes = $d->getListadoExamen();

echo json_encode($examenes);
?>