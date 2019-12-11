<?php 
require_once("../model/Data.php");
require_once("../model/FactorDeRiesgo.php");
require_once("../model/ParametrosClinicos.php");
require_once("../model/TratamientoCardiaco.php");
require_once("../model/UsuarioAdultoMayor.php");
require_once("../model/Observacion.php");

    if (isset($_POST["btnCrearAtencionE"])) {
        //1.- Construyo el Objeto de la clase Data para usar la info en la busqueda
        $d = new Data();

        //2.- Rescato los datos con el VECTOR $_REQUEST
        $idTarjeton = $_REQUEST["idTarjetonE"];
        $fechaAtencion = $_REQUEST["fechaAtencionE"];
        $idPaciente = $_REQUEST["idPacienteE"];
        $profesional = $_REQUEST["profesionalE"];
        $observacion = $_REQUEST["observacionE"];
        $peso = $_REQUEST["pesoE"];
        $talla = $_REQUEST["tallaE"];
        $IMC = $_REQUEST["imcE"];
        $dgNutricionalE = $_REQUEST["diagnosticoNutricionalE"];
        echo $dgNutricionalE;
        $dgNutricionalValorE;
        if ($dgNutricionalE == "Delgadez Severa") {
            $dgNutricionalValorE = 1;
        } else if ($dgNutricionalE == "Delgadez Moderada") {
            $dgNutricionalValorE = 2;
        } else if ($dgNutricionalE == "Delgadez Aceptable") {
            $dgNutricionalValorE = 3;
        } else if ($dgNutricionalE == "Peso Normal") {
            $dgNutricionalValorE = 4;
        } else if ($dgNutricionalE == "Sobrepeso") {
            $dgNutricionalValorE = 5;
        } else if ($dgNutricionalE == "Obeso: Tipo I") {
            $dgNutricionalValorE = 6;
        } else if ($dgNutricionalE == "Obeso: Tipo II") {
            $dgNutricionalValorE = 7;
        } else if ($dgNutricionalE == "Obeso: Tipo III") {
            $dgNutricionalValorE = 8;
        }

        $paSistolica = $_REQUEST["paSistolicaE"];
        $paDistolica = $_REQUEST["paDistolicaE"];
        $circunferencia = $_REQUEST["circunferenciaE"];
        $jsonExamen = $_REQUEST["jsonExamenesE"];
        $fechaEvPieDiabetico = $_REQUEST["fechaEvPieDiabeticoE"];
        $ptjePieDiabetico = $_REQUEST["ptjePieDiabeticoE"];
        $fechaQualidiab = $_REQUEST["fechaQualidabE"];
        $qualidiab = $_REQUEST["qualidiabE"];
        $fechaFondoOjo = $_REQUEST["fechaFondoOjoE"];
        $resultadoFondoOjo = $_REQUEST["resultadoFondoOjoE"];
        $enalapril = $_REQUEST["enalaprilE"];
        $losartan = $_REQUEST["losartanE"];
        $retinopatiaDiabetica = $_REQUEST["retinopatiaDiabeticaE"];
        $amputacion = $_REQUEST["amputacionE"];
        $insuficienciaRenal = $_REQUEST["insuficienciaRenalE"];
        $IAM = $_REQUEST["iamE"];
        $ACV = $_REQUEST["acvE"];
        $estatina = $_REQUEST["estatinasE"];
        $AAS_100 = $_REQUEST["aas100E"];
        $autovalente = $_REQUEST["autovalenteE"];
        $autovalenteConRiesgo = $_REQUEST["autovalenteConRiesgoE"];
        $riesgoDependencia = $_REQUEST["riesgoDependeciaE"];
        $dependencia = $_REQUEST["dependenciaE"];
        $examen = $_REQUEST["jsonExamenesE"];
        $listaExamen = json_decode($examen,JSON_OBJECT_AS_ARRAY);

        //3.- Contruyo los objetos para el update
        $tarjeton = new Tarjeton();
        $factorDeRiesgo = new FactorDeRiesgo();
        $parametrosClinicos = new ParametrosClinicos();
        $tratamientoCardiaco = new TratamientoCardiaco();
        $usuarioAdultoMayor = new UsuarioAdultoMayor();
        $obser = new Observacion();

        //4.- Seteo los datos en los objetos creados
        $tarjeton->setIdTarjeton($idTarjeton);
        $tarjeton->setFechaAtencion($fechaAtencion);
        $tarjeton->setIdPaciente($idPaciente);
        $tarjeton->setIdProfesional($profesional);

        $factorDeRiesgo->setInsuficienciaRenal($insuficienciaRenal);
        $factorDeRiesgo->setIam($IAM);
        $factorDeRiesgo->setAcv($ACV);

        $parametrosClinicos->setPeso($peso);
        $parametrosClinicos->setTalla($talla);
        $parametrosClinicos->setIMC($IMC);
        $parametrosClinicos->setDiagnosticoNutricional($dgNutricionalValorE);
        $parametrosClinicos->setPaSistolica($paSistolica);
        $parametrosClinicos->setPaDistolica($paDistolica);
        $parametrosClinicos->setCircunferenciaCintura($circunferencia);

        $tratamientoCardiaco->setEstatinas($estatina);
        $tratamientoCardiaco->setAAS_100($AAS_100);

        $usuarioAdultoMayor->setAutovalente($autovalente);
        $usuarioAdultoMayor->setAutovalenteConRiesgo($autovalenteConRiesgo);
        $usuarioAdultoMayor->setRiesgoDependencia($riesgoDependencia);
        $usuarioAdultoMayor->setDependencia($dependencia);

        $obser->setObservacion($observacion);

        //5.- LLamo al metodo updateTarjeton del Data
        $d->updateTarjeton($tarjeton,$factorDeRiesgo,$parametrosClinicos,$tratamientoCardiaco,$usuarioAdultoMayor,$obser);

        //6.- Redireccionar hacia formCrearPaciente.php con un mensaje a través del navegador
        // echo "<script>
        //         alert('¡¡Atencion actualizada con exito!!');
        //         window.location= '../view/formCrearTarjeton.php'
        //     </script>";
        
    }else {
        //Si no vienen los datos, redirigir hacia formCrearPaciente.php con mensaje de error a través del método GET
        echo "<script>
                alert('¡¡Error atencion no fue actualizada!!');
                window.location= '../view/formCrearTarjeton.php'
            </script>";
    }

?>