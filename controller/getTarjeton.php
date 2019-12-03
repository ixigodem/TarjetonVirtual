    <?php
        include_once('../model/Data.php');
        include_once('../model/Tarjeton.php');
        include_once('../model/Conexion.php');

        header('Content-Type: application/json');

<<<<<<< HEAD
        // $id = $_GET["id"];
        $id=1;
=======
    $id = $_GET["id"];

    $tarjeton = array();
>>>>>>> f708cda4d2de057f6026de6ae620e52afd7b0cca

        $tarjeton = array();

        $d = new Data();

<<<<<<< HEAD
        $tarjeton = $d->getTarjeton($id);
        echo json_encode($tarjeton, JSON_UNESCAPED_UNICODE);
        //var_dump(json_encode($tarjeton));
    ?>
=======
    echo json_encode($tarjeton);
?>
>>>>>>> f708cda4d2de057f6026de6ae620e52afd7b0cca
