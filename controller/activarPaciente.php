<?php
    if (isset($_POST["runPaciente"])) {
        $runPaciente = $_POST["runPaciente"];

        //LLamo al model donde esta el Data
        require_once("../model/Data.php");

        //Creo un clase $d para llamar los metodos
        $d = new Data();

        //LLamo al metodo eliminar del Data ingresandole el id que viajo por POST desde listarPaciente.php
        $d->activarPaciente($runPaciente);

        //Ahora redirecciono hacia listarPaciente.php y muestro mensaje
        echo "<script>
                alert('¡¡Paciente activado con exito!!');
                window.location= '../view/listarPaciente.php'
            </script>";
            
    }else {
        echo "<script>
                alert('¡¡Error al realizar la activación!!');
                window.location= '../view/listarPaciente.php'
            </script>";
    }
    
?>