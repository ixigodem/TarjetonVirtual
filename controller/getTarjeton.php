<?php 
    include_once('../model/Data.php');
    include_once('../model/Tarjeton.php');
    include_once('../model/Conexion.php');

    $id = $_GET["id"];

    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "db_tarjetonvirtual2";
    $lista = array();

    $mysql = mysqli_connect($host, $user, $pass) or die ("Fallo la conexión");
    mysqli_select_db($mysql,$db) or die ("Fallo el acceso a la base de datos");

    $query = "CALL sp_gettarjeton($id)";

    $result = mysqli_query($mysql,$query);

    $lista = array();
    while ($row = mysqli_fetch_array($result)) {
        $lista = array([0]=>id_Tarjeton);
    }

    echo json_encode($lista);

    // $tarjeton = array();

    // $d = new Data();

    // $tarjeton = $d->getTarjeton($id);
    // $tarjeton = $d->prueba();

    // // var_dump($tarjeton);
    // echo json_encode($tarjeton);
?>