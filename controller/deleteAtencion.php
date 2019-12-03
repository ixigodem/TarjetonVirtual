<?php
    include_once('../model/Data.php');

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $d = new Data();

        //LLamo al metodo del data para eliminar el tarjeton
        $d->eliminarTarjeton($id);

        //Redireccionar hacia formCrearTarjeton.php con un mensaje a través del navegador
        echo "<script>
                alert('¡¡Atención eliminada con exito!!');
                window.location= '../view/formCrearTarjeton.php'
            </script>";
    }else {
        //Si no vienen los datos, redirigir hacia formCrearTarjeton.php con mensaje de error a través del método GET
        echo "<script>
                alert('¡¡Error la atención no fue eliminada!!');
                window.location= '../view/formCrearTarjeton.php'
            </script>";
    }
?>