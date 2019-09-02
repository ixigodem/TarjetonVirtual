<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Crear Profesonal</title>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
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
                Pacientes
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


  <!-- Form para crear pacientes -->
    <form action="../controller/crearProfesional.php" method="POST" id="form-normal">
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="nombres">NOMBRE</label>
                <input type="text" class="form-control" name="nombre" placeholder="Nombre del Profesional:" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
            </div>

        <!-- Obtengo los datos del Data que conecta con la BD -->
            <?php
                require_once("../model/Data.php");

                $d = new Data();

                $estamento = $d->getEstamento();
           ?>

            <div class="form-group col-md-4">
                <label>ESTAMENTO</label>
                <select name="estamento" class="form-control">
                <option selected disabled>Seleccione una opción</option>
                    <?php
                        foreach ($estamento as $e) {
                            echo "<option value='".$e->id_Estamento."'>".$e->nombre."</option>";
                        }
                    ?>
                </select>
            </div>
            <button type="submit" class="btn btn-outline-success my-2 my-sm-0"  name="btnCrearProfesional">Crear Profesional</button>
        </div>
    </form>

    <?php
        if(isset($_POST["btnBuscarProfesional"])){
            $filtro = $_REQUEST["txtBuscarProfesional"];
        }else{
            $filtro = "";
        }
    ?>

    <nav class="navbar navbar-light bg-light">
        <form class="form-inline" action="formCrearProfesional.php" method="POST">
            <input 
            class="form-control mr-sm-2" 
            type="search" 
            placeholder="Buscar profesionales" 
            name="txtBuscarProfesional" 
            value="<?php echo $filtro;?>">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="btnBuscarProfesional">Buscar</button>
        </form>
    </nav>

    <div class="table-responsive">
        <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">NOMBRE</th>
                <th scope="col">ESTAMENTO</th>
                <th scope="col"></th>
            </tr>
        </thead>

    <?php 
        if (isset($_POST["btnBuscarProfesional"])) {
            $filtro = $_REQUEST["txtBuscarProfesional"];
            $profesional = $d->getProfesionalPorFiltro($filtro);
        } else {
            $profesional = $d->getProfesional();
        }

        foreach ($profesional as $p) {
            echo "<tbody>";
                echo "<tr>";
                    echo "<td>".$p->id_Profesional."</td>";
                    echo "<td>".$p->nombre."</td>";
                    echo "<td>".$p->estamento."</td>";
                echo "</tr>";
            echo "</tbody>";
        }
    ?>
        
        </table>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
  
  </body>
</html>