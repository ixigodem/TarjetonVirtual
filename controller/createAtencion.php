<?php 
include_once('../model/Data.php');
include_once('../model/Tarjeton.php');
include_once('../model/FactorDeRiesgo.php');
include_once('../model/Observacion.php');
include_once('../model/ParametrosClinicos.php');
include_once('../model/PacienteDiabetico.php');
include_once('../model/TratamientoCardiaco.php');
include_once('../model/UsuarioAdultoMayor.php');

    if (isset($_POST['btnCrearAtencion'])) {
        $d = new Data();

        //Rescato los datos que vienen por POST del formCrearTarjeton.php
        $fechaAtencion = $_REQUEST["fechaAtencion"];
        $id_Profesional = $_REQUEST["profesional"];
        $txtObservacion = $_REQUEST["txtObservacion"];
        $txtPeso = $_REQUEST["txtPeso"];
        $txtTalla = $_REQUEST["txtTalla"];
        $txtIMC = $_REQUEST["txtIMC"];

        $dgNutricional = $_REQUEST["diagnosticoNutricional"];
        $dgNutricionalValor;
        if ($dgNutricional == "Delgadez Severa") {
            $dgNutricionalValor = 1;
        } else if ($dgNutricional == "Delgadez Moderada") {
            $dgNutricionalValor = 2;
        } else if ($dgNutricional == "Delgadez Aceptable") {
            $dgNutricionalValor = 3;
        } else if ($dgNutricional == "Peso Normal") {
            $dgNutricionalValor = 4;
        } else if ($dgNutricional == "Sobrepeso") {
            $dgNutricionalValor = 5;
        } else if ($dgNutricional == "Obeso: Tipo I") {
            $dgNutricionalValor = 6;
        } else if ($dgNutricional == "Obeso: Tipo II") {
            $dgNutricionalValor = 7;
        } else if ($dgNutricional == "Obeso: Tipo III") {
            $dgNutricionalValor = 8;
        }
        
        $txtPaSistolica = $_REQUEST["txtPaSistolica"];
        $txtPaDistolica = $_REQUEST["txtPaDistolica"];
        $txtCircunferencia = $_REQUEST["txtCircunferencia"];

        //Obtengo el Json con la array
        $examenes = $_REQUEST["jsonExamenes"];
        $listaExamen = json_decode($examenes,JSON_OBJECT_AS_ARRAY);

        $fechaEvPieDiabetico = $_REQUEST["fechaEvPieDiabetico"];
        $txtPjePieDiabetico = $_REQUEST["txtPjPieDiabetico"];
        $fechaQualidiab = $_REQUEST["fechaQualidab"];
        $txtQualidiab = $_REQUEST["txtQualidiab"];
        $fechaFondoOjo = $_REQUEST["fechaFondoOjo"];
        $resultadoFondoOjo = $_REQUEST["resultadoFondoOjo"];
        $enalapril = $_REQUEST["enalapril"];
        $losartan = $_REQUEST["losartan"];
        $retinopatiaDiabetica = $_REQUEST["retinopatiaDiabetica"];
        $amputacion = $_REQUEST["amputacion"];
        $insuficienciaRenal = $_REQUEST["insuficienciaRenal"];
        $iam = $_REQUEST["iam"];
        $acv = $_REQUEST["acv"];
        $estatinas = $_REQUEST["estatinas"];
        $aas100 = $_REQUEST["aas100"];
        $autovalente = $_REQUEST["autovalente"];
        $autovalenteConRiesgo = $_REQUEST["autovalenteConRiesgo"];
        $riesgoDependencia = $_REQUEST["riesgoDependecia"];
        $dependencia = $_REQUEST["dependencia"];
        
        // //Construyo los objetos
        $tarjeton = new Tarjeton();
        $factorDeRiesgo = new FactorDeRiesgo();
        $observacion = new Observacion();
        $pacienteDiabetico = new PacienteDiabetico();
        $parametrosClinicos = new ParametrosClinicos();
        $tratamientoCardiaco = new TratamientoCardiaco();
        $usuarioAdultoMayor = new UsuarioAdultoMayor();

        $tarjeton->setFechaAtencion($fechaAtencion);
        $observacion->setObservacion($observacion);
        $tarjeton->setIdProfesional($id_Profesional);
        $parametrosClinicos->setPeso($txtPeso);
        $parametrosClinicos->setTalla($txtTalla);
        $parametrosClinicos->setIMC($txtIMC);
        $parametrosClinicos->setDiagnosticoNutricional($dgNutricional);
        $parametrosClinicos->setPaSistolica($txtPaSistolica);
        $parametrosClinicos->setPaDistolica($txtPaDistolica);
        $parametrosClinicos->setCircunferenciaCintura($txtCircunferencia);
        $pacienteDiabetico->setFechaEvalPieDiabetico($fechaEvPieDiabetico);
        $pacienteDiabetico->setPtjePieDiabetico($txtPjePieDiabetico);
        $pacienteDiabetico->setFechaQualidiab($fechaQualidiab);
        $pacienteDiabetico->setQualidiab($txtQualidiab);
        $pacienteDiabetico->setFechaFondoOjo($fechaFondoOjo);
        $pacienteDiabetico->setResultadoFondoOjo($resultadoFondoOjo);
        $pacienteDiabetico->setEnalapril($enalapril);
        $pacienteDiabetico->setLosartan($losartan);
        $pacienteDiabetico->setRetinopatiaDiabetica($retinopatiaDiabetica);
        $pacienteDiabetico->setAmputacion($amputacion);
        $factorDeRiesgo->setInsuficienciaRenal($insuficienciaRenal);
        $factorDeRiesgo->setIAM($iam);
        $factorDeRiesgo->setACV($acv);
        $tratamientoCardiaco->setEstatinas($estatinas);
        $tratamientoCardiaco->setAAS100($aas100);
        $usuarioAdultoMayor->setAutovalente($autovalente);
        $usuarioAdultoMayor->setAutovalenteConRiesgo($autovalenteConRiesgo);
        $usuarioAdultoMayor->setRiesgoDependencia($riesgoDependencia);
        $usuarioAdultoMayor->setDependencia($dependencia);

        //LLamo al metodo crearAtencion del Data
        $d->crearAtencion($tarjeton,$observacion,$parametrosClinicos,$pacienteDiabetico,$factorDeRiesgo,$tratamientoCardiaco,$usuarioAdultoMayor,$listaExamen);
      
        //Redireccionar hacia formCrearTarjeton.php con un mensaje a través del navegador
        echo "<script>
            alert('¡¡Atención creada con exito!!');
            window.location= '../view/formCrearTarjeton.php'
        </script>";
    } else {
        //Si no vienen los datos, redirigir hacia formCrearTarjeton.php con mensaje de error a través del método GET
        echo "<script>
                alert('¡¡Error Atención no fue creada!!');
                window.location= '../view/formCrearTarjeton.php'
            </script>";
    }
?>