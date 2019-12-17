<?php
//1.- Pregunto si los datos vienen del POST
require_once("../model/Data.php");
require_once("../model/Paciente.php");
require_once("../model/Estado.php");
require_once("../model/EstadoCivil.php");
require_once("../model/Comuna.php");
require_once("../model/Patologia.php");
require_once("../model/PatologiasPacientes.php");
require_once("../model/Telefono.php");

    if (isset($_POST["btnCrearPaciente"])) {
        //¿Pregunto si presiono el boton?
        //1.- Construyo el Objeto de la clase Data para usar la info en la busqueda
        $data = new Data();

        //2.- Si hay datos rescato el run con el vector $_REQUEST
        $runPaciente = $_REQUEST["run"];

        //3.- Verifico si el rut ya existe
        $busqueda = $data->getPacienteBusqueda($runPaciente);
        if ($busqueda > 0) {
            echo "<script>
                    alert('¡¡Error el paciente ya existe!!');
                    window.location= 'crearPaciente.php'
                </script>";
        } else {
        
        //4.- Si no existe rescato los datos de todo con el vector $_REQUEST
        $run_Paciente = $_REQUEST["run"];
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
        $sector = $_REQUEST["sector"];
        $estado_ID = $_REQUEST["estado"];
        $comuna_ID = $_REQUEST["comuna"];
        $estadoCivil_ID = $_REQUEST["estadoCivil"];
        $fono = $_REQUEST["telefono"];
        $patologias = $_REQUEST["jsonPatologias"];
        $complicaciones = $_REQUEST["jsonComplicaciones"];
        $listaPaciente = json_decode($patologias,JSON_OBJECT_AS_ARRAY);

        //5.- Contruyo un objeto para el Paciente
        $paciente = new Paciente();
        $telefono = new Telefono();

        $paciente->setRun_Paciente($run_Paciente);
        $paciente->setNombres($nombresPacientes);
        $paciente->setApellidoPaterno($apellidoPaterno);
        $paciente->setApellidoMaterno($apellidoMaterno);
        $paciente->setFechaNacimiento($fechaNacimiento);
        $paciente->setSexo($sexo);
        $paciente->setParticipacionSocial($participacionSocial);
        $paciente->setEstudio($estudio);
        $paciente->setActividadLaboral($actividadLaboral);
        $paciente->setDireccionParticular($direccionParticular);
        $paciente->setSector($sector);
        $paciente->setEstadoCivil($estadoCivil_ID);
        $paciente->setComuna($comuna_ID);
        $paciente->setEstado($estado_ID);
        $telefono->setFono($fono);
     
        //6.- LLamo al metodo crearPacienteTelPat del Data
        $data->crearPacienteTelPat($paciente,$listaPaciente,$telefono);

        //7.- Redireccionar hacia formCrearPaciente.php con un mensaje a través del navegador
        echo "<script>
                alert('¡¡Paciente creado con exito!!');
                window.location= '../view/formCrearPaciente.php'
            </script>";
        }
    }else {
        //Si no vienen los datos, redirigir hacia formCrearPaciente.php con mensaje de error a través del método GET
        echo "<script>
                alert('¡¡Error paciente no fue creado!!');
                window.location= '../view/formCrearPaciente.php'
            </script>";
    }
    
?>