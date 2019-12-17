<?php
    include_once('../model/Data.php');

    $patologia = $_POST["cboPatologia"];

    $datos = array();

    $d = new Data();

    $datos = $d->getCantidadPacientesPorDiagnostico($patologia);

    echo json_encode($datos);
?>