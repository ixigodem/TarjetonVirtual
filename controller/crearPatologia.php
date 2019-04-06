<?php
    require_once "../model/PatologiasPacientes.php";

    $p = new PatologiasPacientes();

    $fechaPatologias = $_REQUEST["fechaPatologias"];
    $Patologia_ID = $_REQUEST["Patologia_ID"];

    $p->setFechaPatologias($fechaPatologias);
    $p->setPatologiaID($Patologia_ID);

    if ($p->getFechaPatologias() === '' || $p->getPatologiaID() === '') {
        echo json_encode('error');
    } else {
        session_start();
        if (isset($_SESSION["listado"])) {
            $listado = $_SESSION["listado"];
        }else{
            $listado = array();
        }

        array_push($listado,$p);
        $_SESSION["listado"] = $listado;
    
        // echo json_encode($listado);
    }
?>