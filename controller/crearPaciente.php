<?php
//1.- Pregunto si los datos vienen del POST
require_once("../model/Data.php");
require_once("../model/Paciente.php");
require_once("../model/Estado.php");
require_once("../model/EstadoCivil.php");
require_once("../model/Comuna.php");

    if (isset($_POST["btnCrearPaciente"])) {
        //¿Pregunto si presiono el boton?

        //2.- Si hay datos los rescato con el vector $_REQUEST
        $runPaciente = $_REQUEST["run"];
        $nombresPacientes = $_REQUEST["nombres"];
        $apellidoPaterno = $_REQUEST["apellidoPaterno"];
        $apellidoMaterno = $_REQUEST["apellidoMaterno"];
        $fechaNacimiento = $_REQUEST["fechaNacimiento"];
        $sexo = $_REQUEST["sexo"];
        $selectParticipacion = $_POST["participacionSocial"];
        $participacionSocial = $selectParticipacion;
        $selectEstudio = $_POST["estudio"];
        $estudio = $selectEstudio;
        $actividadLaboral = $_REQUEST["actividadLaboral"];
        $direccionParticular = $_REQUEST["direccionParticular"];
        $estado = $_REQUEST["estado"];
        $comuna = $_REQUEST["comuna"];
        $estadoCivil = $_REQUEST["estadoCivil"];

        //3.- Contruyo un objeto para el Paciente
        $paciente = new Paciente();

        $paciente->setRun_Paciente($runPaciente);
        $paciente->setNombres($nombresPacientes);
        $paciente->setApellidoPaterno($apellidoPaterno);
        $paciente->setApellidoMaterno($apellidoMaterno);
        $paciente->setFechaNacimiento($fechaNacimiento);
        $paciente->setSexo($sexo);
        $paciente->setParticipacionSocial($participacionSocial);
        $paciente->setEstudio($estudio);
        $paciente->setActividadLaboral($actividadLaboral);
        $paciente->setDireccionParticular($direccionParticular);
        $paciente->setEstadoCivil($estadoCivil);
        $paciente->setComuna($comuna);
        $paciente->setEstado($estado);
        
        //4.- Construyo el Objeto de la clase Data
        $data = new Data();

        //5.- LLamo al metodo crearPaciente del Data
        $data->crearPaciente($paciente);

        //6.- Redireccionar hacia formCrearPaciente.php con un mensaje a través del método GET
        header("location: ../view/formCrearPaciente.php?mensaje=1");
    }else {
        //Si no vienen los datos, redirigir hacia formCrearPaciente.php con mensaje de error a través del método GET
        header("location: ../view/formActor.php?error=1");
    }
?>