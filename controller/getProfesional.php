<?php 
include_once('../model/Data.php');
include_once('../model/Profesional.php');

$d = new Data();

$profesional = $d->getProfesional();
// var_dump($profesional);
echo json_encode($profesional);
?>