<?php
//1.- Pregunto si los datos vienen del POST
require_once("../model/Data.php");
require_once("../model/Estamento.php");
require_once("../model/Profesional.php");

    if (isset($_POST["btnCrearProfesional"])) {
        //¿Pregunto si presiono el boton?
        //1.- Construyo el Objeto de la clase Data para usar la info en la busqueda
        $data = new Data();

        //2.- Si hay datos rescato el run con el vector $_REQUEST
        $nombreProfesional = $_REQUEST["nombre"];

        //3.- Verifico si el nombre ya existe
        $busqueda = $data->getProfesionalBusqueda($nombreProfesional);
            if ($busqueda>0) {
                echo "<script>
                        alert('¡¡Error el Profesional ya existe!!');
                        window.location= '../view/formCrearProfesional.php'
                    </script>";
            } else {
                //4.- Si no existe rescato los datos de todo con el vector $_REQUEST
                $nombre = $_REQUEST["nombre"];
                $estamento_ID = $_REQUEST["estamento"];

                //5.- Contruyo un objeto para el Paciente
                $profesional = new Profesional();

                $profesional->setNombreProfesional($nombre);
                $profesional->setEstamento($estamento_ID);

                //6.- LLamo al metodo crearPaciente del Data
                $data->crearProfesional($profesional);

                //7.- Redireccionar hacia formCrearPaciente.php con un mensaje a través del navegador
                echo "<script>
                        alert('¡¡Profesional creado con exito!!');
                        window.location= '../view/formCrearProfesional.php'
                    </script>";
            }
    }else {
        //Si no vienen los datos, redirigir hacia formCrearPaciente.php con mensaje de error a través del método GET
        echo "<script>
                alert('¡¡Error profesionl no fue creado!!');
                window.location= '../view/formCrearProfesional.php'
            </script>";
    }    
?>