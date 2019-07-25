<?php
    require_once "../model/PatologiasPacientes.php";

    $p = new PatologiasPacientes();

    $p->setFechaPatologias($_POST["fechaPatologias"]);
    $p->setPatologiaID($_POST["Patologia_ID"]);

    if ($p->getFechaPatologias() === '' || $p->getPatologiaID() === '') {
        header('Content-Type: application/json');
        $datos = array('estado' => 'error');
    } else {
        header('Content-Type: application/json');
        $datos = array(
            'estado' => 'ok',
            'fechaPatologias' => $p->getFechaPatologias(),
            'Patologia_ID' => $p->getPatologiaID()
        );

        // session_start();
        // if (isset($_SESSION["listado"])) {
        //     $listado = $_SESSION["listado"];
        // }else{
        //     $listado = array();
        // }

        // array_push($listado,$p);
        // $_SESSION["listado"] = $listado;
    }
    echo json_encode($datos);
?>