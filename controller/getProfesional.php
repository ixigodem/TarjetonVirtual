<?php 
include_once('../model/Data.php');
include_once('../model/Profesional.php');

$d = new Data();

$profesional = $d->getProfesional();

echo json_encode($profesional);
?>