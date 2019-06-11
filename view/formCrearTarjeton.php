<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Crear Tarjeton</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <!-- Import css local -->
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <!-- Import jquery -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
</head>
<body>
<!-- Navbar con los menus desplegables -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <li><a class="navbar-brand" href="../index.php">
            <img src="../img/Enfermeria.png" width="30" height="30" class="d-inline-block align-top" href="../index.php">Tarjetón Virtual</a>
            </li>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
            <li class="nav-item"><a href="Menu.php" class="nav-link">Inicio</a></li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Creación de Paciente
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="formCrearPaciente.php">Crear Paciente</a>
                <a class="dropdown-item" href="listarPaciente.php">Buscar Paciente</a>
                </div>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Profesionales
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="formCrearProfesional.php">Crear Profesional</a>
                </div>
            </li>
            
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Tarjetón
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="formCrearTarjeton.php">Crear Tarjetón</a>
                <a class="dropdown-item" href="#">Busqueda de tarjetones</a>
                </div>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Gestión
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Reporte Tarjetón</a>
                <a class="dropdown-item" href="#">Control HTA</a>
                <a class="dropdown-item" href="#">Control DM2</a>
                <a class="dropdown-item" href="#">Control Epilepsia</a>
                </div>
            </li>

            <li class="nav-item"><a href="http://web.saludcormun.cl/?page_id=3733" class="nav-link">Sobre Nosotros</a></li>
            </ul>
        </div>
    </nav>
<!-- Navbar con los menus desplegables -->

    <?php
        require_once("../model/Data.php");
        $d = new Data();
    ?>
    <?php
        if(isset($_POST["btnBuscarPacienteTarjeton"])){
            $filtro = $_REQUEST["txtRun"];
        }else{
            $filtro = "";
        }
    ?>

<!-- Formulario de busqueda de paciente -->
    <nav class="navbar navbar-light bg-light">
        <form id="formGetPaciente" method="POST" class="form-inline">
            <input class="form-control mr-sm-2" name="txtRun" id="txtRun"
            onkeyup="checkRun(this)" placeholder="Ej. 11222333-4" maxlength="10">
            <button class="btn btn-outline-success my-2 my-sm-0" name="btnBuscarPaciente" type="submit">Buscar Paciente</button>
        </form>
    </nav>
<!-- Formulario de busqueda de paciente -->

    <div class="table-responsive">
        <table class="table table-hover">
            <thead class="thead-light" id="tituloTablaPaciente"></thead>
            <tbody id="cuerpoTablaPaciente"></tbody>
            <!-- class="table-active" -->
        </table>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead id="tituloTablaTarjeton"></thead>
            <tr id="seccionCreateNewTarjeton"></tr>
            <tbody id="cuerpoTablaTarjeton"></tbody>
        </table>
    </div>


    <script src="../js/crearTarjeton.js"></script> 
    <script src="../js/validadorRun.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
</html>