<?php 
include_once('../model/Data.php');
include_once('../model/Patologia.php');

$d = new Data();

$patologia = $d->getPatologia();

echo json_encode($patologia);
?>