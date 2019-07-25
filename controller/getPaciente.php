<?php 
    include_once('../model/Data.php');
    include_once('../model/Paciente.php');

    $d = new Data();

    $run = $_GET["run"];

    $paciente = $d->getPacienteTarjeton($run);

    echo json_encode($paciente);
    // var_dump($paciente);
?>