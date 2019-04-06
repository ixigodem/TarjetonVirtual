<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Crear Tarjeton</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
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


    <?php
        require_once("../model/Data.php");
        $d = new Data();
    ?>
    <?php
        if(isset($_POST["btnBuscarPaciente"])){
            $filtro = $_REQUEST["txtRun"];
        }else{
            $filtro = "";
        }
    ?>

    <nav class="navbar navbar-light bg-light">
        <form class="form-inline" action="formCrearTarjeton.php" method="POST">
            <input 
            type="search" class="form-control" 
            id="txtRun" name="txtRun" 
            onkeyup="checkRun(this)" 
            placeholder="Ej. 11222333-4" 
            maxlength="10" 
            required>
           
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="btnBuscarPaciente">Buscar</button>
        </form>
    </nav>

    <div class="table-responsive">
        <table class="table">
        <thead class="thead-dark">
            <tr>
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
                <th scope="col">ESTADO CIVIL</th>
                <th scope="col">COMUNA</th>
                <th scope="col">ESTADO</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>

            <?php 
                if (isset($_POST["btnBuscarPaciente"])) {
                    $filtro = $_REQUEST["txtRun"];
                    $paciente = $d->getPacientePorFiltro($filtro);
                    $tarjeton = $d->getTarjetonPorFiltro($filtro);
                } else {
                    $paciente = $d->getPacientePorFiltro($filtro);
                    $tarjeton = $d->getTarjetonPorFiltro($filtro);
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
                            echo "<td>".$p->estadoCivil."</td>";
                            echo "<td>".$p->comuna."</td>";
                            echo "<td>".$p->estado."</td>";
                        echo "</tr>";
                    echo "</tbody>";
                }
            ?>
        </table>
    </div>

<!--
DM Insulina
Dislipidemia
Epilepsia
Artrosis
Hipotoridismo
Tabaco
FECHA
Hb Glic
Hb Glic	Glicemia
Creatinina
Colesterol Total
HDL
LDL
Triglic
MAU/CREAT
(RAC)
VFG
Pauta ERC
Riesgo Cardiovascular
Fecha Eval Pie db
Ptje Pie db(puntos)
Fecha Qualidiab
Qualidiab
Fecha Fondo ojo
Resultado Fondo ojo
Diabeticos con Enalapril o Losartan
Retinopatia Diabetica
Ceguera
Insuf renal
Amputacion diabetico
IAM
ACV
ESTATINAS
AAS (100)
Autovalente
Autovalente C/riesgo
Riesgo Dependencia
Dependencia
-->

  <!-- Form para crear pacientes -->
    <form action="../controller/crearTarjeton.php" method="POST" id="form-normal">
        <div class="table-responsive">
            <table class="table">
            <thead>
                <tr>
                <th scope="col">PESO</th>
                <th scope="col">TALLA</th>
                <th scope="col">IMC</th>
                <th scope="col">DIAGNOSTICO NUTRICIONAL</th>
                <th scope="col">PA SISTOLICA</th>
                <th scope="col">PA DISTOLICA</th>
                <th scope="col">CIRCUNFERENCIA CINTURA</th>
                <th scope="col">PATOLOGIAS CARDIOVASCULARES</th>
                <th scope="col">DISLIPIDEMIA</th>
                <th scope="col">RESULTADO FONDO DE OJO</th>
                <th scope="col">RETINOPATIA DIABETICA</th>
                <th scope="col">IAM</th>
                <th scope="col">ACV</th>
                <th scope="col">ESTATINAS</th>
                <th scope="col">AAS(100)</th>
                <th scope="col">Handle</th>
                <th scope="col">Handle</th>
                <th scope="col">Handle</th>
                <th scope="col">Handle</th>
                <th scope="col">Handle</th>
                <th scope="col">Handle</th>
                <th scope="col">Handle</th>
                <th scope="col">Handle</th>
                <th scope="col">Handle</th>
                <th scope="col">Handle</th>
                <th scope="col">Handle</th>
                <th scope="col">Handle</th>
                <th scope="col">Handle</th>
                <th scope="col">Handle</th>
                <th scope="col">Handle</th>
                <th scope="col">Handle</th>
                <th scope="col">Handle</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <th scope="row">1</th>
                <td>78</td>
                <td>21</td>
                <td>44,5</td>
                <td>NORMAL</td>
                <td>147</td>
                <td>91</td>
                <td>97</td>
                <td>SI</td>
                <td>NO</td>
                <td>NO</td>
                <td>NO</td>
                <td>NO</td>
                <td>NO</td>
                <td>NO</td>
                </tr>
            </tbody>
                
            </table>
        </div>

        <div class="table-responsive">
        <table class="table">
        <thead class="thead-dark">
            <tr>
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
                <th scope="col">ESTADO CIVIL</th>
                <th scope="col">COMUNA</th>
                <th scope="col">ESTADO</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>

            <?php 
                foreach ($tarjeton as $t) {
                    echo "<tbody>";
                        echo "<tr>";
                            echo "<td>".$t->run_Paciente."</td>";
                            echo "<td>".$t->nombres."</td>";
                            echo "<td>".$t->apellidoPaterno."</td>";
                            echo "<td>".$t->apellidoMaterno."</td>";
                            echo "<td>".$t->fechaNacimiento."</td>";
                            if ($p->sexo==0) {
                                echo "<td>MASCULINO</td>";
                            } else if ($p->sexo==1){
                                echo "<td>FEMENINO</td>";
                            }
                            echo "<td>".$t->participacionSocial."</td>";
                            echo "<td>".$t->estudio."</td>";
                            echo "<td>".$t->actividadLaboral."</td>";
                            echo "<td>".$t->direccionParticular."</td>";
                            echo "<td>".$t->estadoCivil."</td>";
                            echo "<td>".$t->comuna."</td>";
                            echo "<td>".$t->estado."</td>";
                            echo "<td>";
                                echo "<form action='' method='post'>";
                                    echo "<input type='hidden' name='' value='".$t->run_Paciente."'>";
                                    echo "<input type='submit' class='btn btn-primary' value='Activar'>";
                                echo "</form>";
                            echo "</td>";
                        echo "</tr>";
                    echo "</tbody>";
                }
            ?>
        </table>
    </div>
        <button type="submit" class="btn btn-primary" name="btnCrearTarjeton">Crear Tarjetón</button>
    </form>
    <script src="../js/crearPaciente.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
</html>