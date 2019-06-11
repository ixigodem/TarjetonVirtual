<?php 
    include_once('../model/Data.php');
    include_once('../model/Tarjeton.php');

    $d = new Data();

    $id = $_GET["id"];

    $tarjeton = $d->getTarjeton($id);

    // var_dump($tarjeton);
    $lista;

    foreach ($tarjeton as $t) {
        $listaExamen = $t->examenes;
        $examenes = explode(",",$listaExamen);
        $lista = [$t->fechaAtencion,$t->observacion,$t->peso,$t->talla,$t->IMC,$t->diagnosticoNutricional,
        $t->circunferenciaCintura,$examenes[0],$examenes[1],$examenes[2],$t->fechaEvalPieDiabetico,
        $t->ptjePieDiabetico,$t->fechaQualidiab,$t->qualidiab,$t->fechaFondoOjo,$t->enalapril,$t->losartan,
        $t->retinopatiaDiabetica,$t->amputacion,$t->insuficienciaRenal,$t->IAM,$t->ACV,$t->estatinas,
        $t->AAS_100,$t->autovalente,$t->autovalenteConRiesgo,$t->riesgoDependencia,$t->dependencia];
    }

    // echo ($lista);


    // echo json_encode($tarjeton);
    echo json_encode($lista);
?>