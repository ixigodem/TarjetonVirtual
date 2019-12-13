<?php 
require_once("../model/Data.php");
require_once("../model/Paciente.php");
require_once("../model/Estado.php");
require_once("../model/EstadoCivil.php");
require_once("../model/Comuna.php");

    if (isset($_POST["btnEditarPaciente"])) {
        //1.- Construyo el Objeto de la clase Data para usar la info en la busqueda
        $d = new Data();

        //2.- Rescato los datos con el VECTOR $_REQUEST
        $id = $_REQUEST["idPaciente"];
        $run = $_REQUEST["runE"];
        $nombres = $_REQUEST["nombresE"];
        $apellidoPaterno = $_REQUEST["apellidoPaternoE"];
        $apellidoMaterno = $_REQUEST["apellidoMaternoE"];
        $fechaNac = $_REQUEST["fechaNacimientoE"];
        $sexo = $_REQUEST["sexoE"];
        $participacionSocial = $_REQUEST["participacionSocialE"];
        $estudio = $_REQUEST["estudioE"];
        $telefonoP = $_REQUEST["telefonoE"];
        $actividadLaboral = $_REQUEST["actividadLaboralE"];
        $direccionParticular = $_REQUEST["direccionParticularE"];
        $sector = $_REQUEST["sectorE"];
        $estadoCivilP = $_REQUEST["estadoCivilE"];
        $comunaP = $_REQUEST["comunaE"];
        $estadoP = $_REQUEST["estadoE"];

        //3.- Construyo los objetos para el update
        $paciente = new Paciente();
        $telefono = new Telefono();

        //4.- Seteo los datos en los objetos creados
        $paciente->setId_Paciente($id);
        $paciente->setRun_Paciente($run);
        $paciente->setNombres($nombres);
        $paciente->setApellidoPaterno($apellidoPaterno);
        $paciente->setApellidoMaterno($apellidoMaterno);
        $paciente->setFechaNacimiento($fechaNac);
        $paciente->setSexo($sexo);
        $paciente->setParticipacionSocial($participacionSocial);
        $paciente->setEstudio($estudio);
        $paciente->setActividadLaboral($actividadLaboral);
        $paciente->setDireccionParticular($direccionParticular);
        $paciente->setSector($sector);
        $paciente->setEstado($estadoP);
        $paciente->setEstadoCivil($estadoCivilP);
        $paciente->setComuna($comunaP);

        $telefono->setFono($telefonoP);

        //5.- LLamo al metodo updateTarjeton del Data
        $d->updatePaciente($paciente,$telefono);

            //6.- Redireccionar hacia formCrearPaciente.php con un mensaje a través del navegador
        echo "<script>
            alert('¡¡Paciente actualizado con exito!!');
            window.location= '../view/listarPaciente.php'
        </script>";
    }else {
        //Si no vienen los datos, redirigir hacia formCrearPaciente.php con mensaje de error a través del método GET
        echo "<script>
                alert('¡¡Error paciente no fue actualizado!!');
                window.location= '../view/listarPaciente.php'
            </script>";
    }
?>