<?php
    if (isset($_POST["idProfesional"])) {
        $runPaciente = $_POST["idProfesional"];

        //LLamo al model donde esta el Data
        require_once("../model/Data.php");

        //Creo un clase $d para llamar los metodos
        $d = new Data();

        //LLamo al metodo eliminar del Data ingresandole el id que viajo por POST desde listarPaciente.php
        $d->eliminarPaciente($runPaciente);

        //Ahora redirecciono hacia listarPaciente.php y muestro mensaje
        echo "<script>
                alert('¡¡Paciente eliminado con exito!!');
                window.location= '../view/listarPaciente.php'
            </script>";
            
    }else {
        echo "<script>
                alert('¡¡Error al realizar el eliminado!!');
                window.location= '../view/listarPaciente.php'
            </script>";
    }
    
?>