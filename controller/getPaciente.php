<?php 
    include_once('../model/Data.php');
    include_once('../model/Paciente.php');

    $d = new Data();

    $id = isset($_GET["id"])?$_GET["id"]:'';
    $run = isset($_GET["run"])?$_GET["run"]:'';

    $paciente = $d->getPacienteTarjeton($run,$id);

    echo json_encode($paciente);
?>