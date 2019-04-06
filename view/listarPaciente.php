<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Buscar Pacientes</title>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/>

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>

  <nav>
    <div class="nav-wrapper">
      <img src="../img/Enfermeria.png" width="30" height="30" class="d-inline-block align-top" href="../index.php">Tarjetón Virtual</a>
      <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>

    <ul id="nav-mobile" class="right hide-on-med-and-down">

    <ul class="collapsible">
        <li>
            <div class="collapsible-header">Paciente</div>
            <div class="collapsible-body"><a href="formCrearPaciente.php">Crear Paciente</a></div> 
            <div class="collapsible-body"><a href="listarPaciente.php">Buscar Paciente</a></div>
        </li>
    </ul>

    </ul>

    </div>
  </nav>

  <ul class="sidenav" id="mobile-demo">
    <ul class="collapsible popout">
        <li><a class="navbar-brand" href="Menu.php">
            <img src="../img/Enfermeria.png" width="30" height="30" class="d-inline-block align-top" href="../index.php">
            Tarjetón Virtual
            </a>
        </li>
        <li><a href="Menu.php" class="nav-link">Inicio</a></li>
        <li>
        <div class="collapsible-header"><i class="material-icons">filter_drama</i>Paciente</div>
            <div class="collapsible-body"><a href="formCrearPaciente.php">Crear Paciente</a></div> 
            <div class="collapsible-body"><a href="listarPaciente.php">Buscar Paciente</a></div>
        </li>

        <li>
        <div class="collapsible-header"><i class="material-icons">filter_drama</i>Profesional</div>
            <div class="collapsible-body"><a href="formCrearProfesional.php">Crear Profesional</a></div>
        </li>

        <li>
        <div class="collapsible-header"><i class="material-icons">whatshot</i>Tarjetón</div>
            <div class="collapsible-body"><a href="formCrearTarjeton.php">Crear Tarjetón</a></div>
        </li>

        <li>
        <div class="collapsible-header"><i class="material-icons">whatshot</i>Gestión</div>
            <div class="collapsible-body"><a href="#!">Reporte Tarjetón</a></div>
            <div class="collapsible-body"><a href="#!">Control HTA</a></div>
            <div class="collapsible-body"><a href="#!">Control DM2</a></div>
            <div class="collapsible-body"><a href="#!">Control Epilepsia</a></div>
        </li>
    </ul>
  </ul>

  <!-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <li><a class="navbar-brand" href="Menu.php">
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

            </ul>
        </div>
   </nav> -->

    <?php
        require_once("../model/Data.php");
        $d = new Data();
    ?>
    <?php
        if(isset($_POST["btnBuscarPaciente"])){
            $filtro = $_REQUEST["txtBuscarPaciente"];
        }else{
            $filtro = "";
        }
    ?>

    <nav class="navbar navbar-light bg-light">
        <form class="form-inline" action="listarPaciente.php" method="POST">
            <input 
            class="form-control mr-sm-2" 
            type="search" 
            placeholder="Buscar Paciente" 
            name="txtBuscarPaciente" 
            value="<?php echo $filtro;?>">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="btnBuscarPaciente">Buscar</button>
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="btnMostrarPacientePasivo">Mostrar Pacientes Pasivos</button>
        </form>
    </nav>

    <div class="table-responsive">
        <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">RUN</th>
                <th scope="col">NOMBRES</th>
                <th scope="col">APELLIDO PATERNO</th>
                <th scope="col">APELLIDO MATERNO</th>
                <th scope="col">FECHA DE NACIMIENTO</th>
                <th scope="col">SEXO</th>
                <th scope="col">PARTICIPACIÓN SOCIAL</th>
                <th scope="col">ESTUDIO</th>
                <th scope="col">ACTIVIDAD LABORAL</th>
                <th scope="col">DIRECCIÓN PARTICULAR</th>
                <th scope="col">SECTOR</th>
                <th scope="col">TELEFONO</th>
                <th scope="col">ESTADO CIVIL</th>
                <th scope="col">COMUNA</th>
                <th scope="col">ESTADO</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>

    <?php 
        if (isset($_POST["btnBuscarPaciente"])) {
            $filtro = $_REQUEST["txtBuscarPaciente"];
            $paciente = $d->getPacientePorFiltro($filtro);
        } else if (isset($_POST["btnMostrarPacientePasivo"])) {
            $paciente = $d->getPacientePasivos();
        } else {
            $paciente = $d->getPaciente();
        }

        foreach ($paciente as $p) {
            echo "<tbody>";
                echo "<tr>";
                    echo "<td>".$p->run_Paciente."</td>";
                    echo "<td>".$p->nombres."</td>";
                    echo "<td>".$p->apellidoPaterno."</td>";
                    echo "<td>".$p->apellidoMaterno."</td>";
                    echo "<td>".$p->fechaNacimiento."</td>";
                    if ($p->sexo==0) {
                        echo "<td>MASCULINO</td>";
                    } else if ($p->sexo==1){
                        echo "<td>FEMENINO</td>";
                    }
                    echo "<td>".$p->participacionSocial."</td>";
                    echo "<td>".$p->estudio."</td>";
                    echo "<td>".$p->actividadLaboral."</td>";
                    echo "<td>".$p->direccionParticular."</td>";
                    echo "<td>".$p->sector."</td>";
                    echo "<td>".$p->fono."</td>";
                    echo "<td>".$p->estadoCivil."</td>";
                    echo "<td>".$p->comuna."</td>";
                    echo "<td>".$p->estado."</td>";

                    echo "<td>";
                    echo "<form action='../controller/activarPaciente.php' method='post'>";
                        echo "<input type='hidden' name='runPaciente' value='".$p->run_Paciente."'>";
                        echo "<input type='submit' class='btn btn-primary' value='Activar'>";
                    echo "</form>";
                echo "</td>";

                    echo "<td>";
                    echo "<form action='../controller/eliminarPaciente.php' method='post'>";
                        echo "<input type='hidden' name='runPaciente' value='".$p->run_Paciente."'>";
                        echo "<input type='submit' class='btn btn-primary' value='Eliminar'>";
                    echo "</form>";
                echo "</td>";
                echo "</tr>";
            echo "</tbody>";
        }
    ?>
        
        </table>
    </div>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.sidenav');
    var instances = M.Sidenav.init(elems, {edge:'left'});
      var instance = M.Sidenav.getInstance(instances);
  });

  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.collapsible.popout');
    var instances = M.Collapsible.init(elems, {accordion:true});
    var instance = M.Collapsible.getInstance(instances);
  });

    document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.tooltipped');
    var instances = M.Tooltip.init(elems, {exitDelay:0});
    var instance = M.Tooltip.getInstance(instances);
  });

</script>
    <!--JavaScript at end of body for optimized loading-->
    <script type="text/javascript" src="../js/materialize.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
</html>