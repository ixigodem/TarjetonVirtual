<?php 
    include_once('../model/Data.php');
    include_once('../model/Paciente.php');

    $d = new Data();

    $id = isset($_REQUEST["id"])?$_REQUEST["id"]:'';
    $run = isset($_REQUEST["run"])?$_REQUEST["run"]:'';

    // $run = "";
    // $id = "";

    // if (isset($_REQUEST["id"])) {
    //     $id = $_REQUEST["id"];
    // }else  if(isset($_REQUEST["run"])){
    //     $run = $_REQUEST["run"];
    // }

    $paciente = $d->getPacienteTarjeton($id,$run);

    echo json_encode($paciente);
?>