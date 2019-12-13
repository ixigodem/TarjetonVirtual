<?php 
  @session_start(); 
  include("../controller/Seguridad.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Buscar Pacientes</title>
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
        if(isset($_POST["btnBuscarPaciente"])){
            $filtro = $_REQUEST["txtBuscarPaciente"];
        }else{
            $filtro = "";
        }
    ?>

    <nav class="navbar navbar-light bg-light">
        <form class="form-inline" action="listarPaciente.php" method="POST">
            <div class="row">
                <div class="input-field col s6">
                    <input type="text" class="form-control" name="txtBuscarPaciente" placeholder="Ej: Juan Perez" data-length="120" value="<?php echo $filtro;?>">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="btnBuscarPaciente">Buscar</button>
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="btnMostrarPacientePasivo">Mostrar Pacientes Pasivos</button>
                </div>
            </div>
        </form>
    </nav>

    <div class="table-responsive">
        <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">N° INSCRIPCIÓN</th>
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
                    echo "<td>".$p->id_Paciente."</td>";
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
                    if ($p->estado == 'ACTIVO') {
                        echo "<td>";
                            echo "<button type='button' onclick='actualizarPaciente($p->id_Paciente);' class='btn btn-outline-warning'>Editar</button>";
                        echo "</td>";

                        echo "<td>";
                            echo "<form action='../controller/eliminarPaciente.php' method='post'>";
                                echo "<input type='hidden' name='runPaciente' value='".$p->run_Paciente."'>";
                                echo "<input type='submit' class='btn btn-outline-danger' value='Eliminar'>";
                            echo "</form>";
                        echo "</td>";
                    } else {
                        echo "<td>";
                            echo "<form action='../controller/activarPaciente.php' method='post'>";
                                echo "<input type='hidden' name='runPaciente' value='".$p->run_Paciente."'>";
                                echo "<input type='submit' class='btn btn-outline-success' value='Activar'>";
                            echo "</form>";
                        echo "</td>";
                    }
                echo "</tr>";
            echo "</tbody>";
        }
    ?>
        
        </table>
    </div>

    <div class="modal fade" id="editarPaciente" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editar Paciente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="../controller/updatePaciente.php" method="POST" id="form-normal">
                    <div class="form-row">
                        <input type="hidden" name="idPaciente" id="idPaciente">
                        <div class="form-group col-md-3 col-lg-3 col-sm-12">
                            <label for="run">RUN</label>
                            <input type="text" class="form-control" id="runE" name="runE" maxlength="10" readonly required>
                        </div>
                        <div class="form-group col-md-3 col-lg-3 col-sm-12">
                            <label for="nombres">NOMBRES</label>
                            <input type="text" class="form-control" id="nombresE" name="nombresE" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                        </div>
                        <div class="form-group col-md-3 col-lg-3 col-sm-12">
                            <label for="apellidoPaterno">APELLIDO PATERNO</label>
                            <input type="text" class="form-control" id="apellidoPaternoE" name="apellidoPaternoE" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                        </div>
                        <div class="form-group col-md-3 col-lg-3 col-sm-12">
                            <label for="apellidoMaterno">APELLIDO MATERNO</label>
                            <input type="text" class="form-control" id="apellidoMaternoE" name="apellidoMaternoE" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                        </div>

                        <div class="form-group col-md-3 col-lg-3 col-sm-12">
                            <label for="fechaNacimiento">FECHA DE NACIMIENTO</label>
                            <input type="date" class="form-control" id="fechaNacimientoE" name="fechaNacimientoE" required>
                        </div>

                        <div class="form-group col-md-2 col-lg-2 col-sm-12">
                            <fieldset>
                                <label>SEXO</label>
                                <br>
                                    <p>
                                    <label>
                                        <input type="radio" id="sexoE" name="sexoE" value="0"> 
                                        <span>Masculino</span>
                                    </label>
                                    </p>
                                    <p>
                                    <label>
                                        <input type="radio" id="sexoE" name="sexoE" value="1"> 
                                        <span>Femenino</span>
                                    </label>
                                    </p>
                            </fieldset>
                        </div>

                        <div class="form-group col-md-3 col-lg-3 col-sm-12">
                            <label for="inputState">PARTICIPACIÓN SOCIAL</label>
                            <select id="inputState" class="form-control" id="participacionSocialE" name="participacionSocialE" required>
                                <option value="NO TIENE">NO TIENE</option>
                                <option value="JUNTA DE VECINOS">JUNTA DE VECINOS</option>
                                <option value="VOLUNTARIADO">VOLUNTARIADO</option>
                                <option value="CLUB SOCIAL">CLUB SOCIAL</option>
                                <option value="ORGANIZACIONES SOCIALES">ORGANIZACIONES SOCIALES</option>
                                <option value="IGLESIA">IGLESIA</option>
                            </select>
                        </div>

                        <div class="form-group col-md-3 col-lg-3 col-sm-12">
                            <label for="estudio">ESTUDIO</label>
                            <select id="estudio" class="form-control" id="estudioE" name="estudioE" required>
                                <option value="ENSEÑANZA BASICA">ENSEÑANZA BASICA</option>
                                <option value="ENSEÑANZA MEDIA">ENSEÑANZA MEDIA</option>
                                <option value="CENTRO DE FORMACIÓN TECNICA">CENTRO DE FORMACIÓN TECNICA</option>
                                <option value="INSTITUTO PROFESIONAL">INSTITUTO PROFESIONAL</option>
                                <option value="UNIVERSITARIA">UNIVERSITARIA</option>
                            </select>
                        </div>

                        <div class="form-group col-md-3 col-lg-3 col-sm-12">
                            <label for="actividadLaboral">TELEFONO</label>
                            <input type="telefono" class="form-control" id="telefonoE" name="telefonoE"  pattern="(+[0-9]{3}) [0-9]{3} [0-9]{2} [0-9]{3}" title="Use el formato +56987654321" maxlength="12" required>
                        </div>

                        <div class="form-group col-md-4 col-lg-4 col-sm-12">
                            <label for="actividadLaboral">ACTIVIDAD LABORAL</label>
                            <input type="text" class="form-control" id="actividadLaboralE" name="actividadLaboralE" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                        </div>

                        <div class="form-group col-md-4 col-lg-4 col-sm-12">
                            <label for="direccionParticular">DIRECCIÓN PARTICULAR</label>
                            <input type="text" class="form-control" id="direccionParticularE" name="direccionParticularE" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                        </div>

                        <div class="form-group col-md-3 col-lg-3 col-sm-12">
                            <label for="sector">SECTOR</label>
                            <select id="sector" class="form-control" id="sectorE" name="sectorE" required>
                                <option value="AMARILLO">AMARILLO</option>
                                <option value="VERDE">VERDE</option>
                                <option value="AZUL">AZUL</option>
                            </select>
                        </div>

                        <?php
                            require_once("../model/Data.php");

                            $data = new Data();

                            $estadoCivil = $data->getEstadoCivil();
                            $comuna = $data->getComuna();
                            $estado = $data->getEstado();
                            $patologia = $data->getPatologia();
                            $complicacion = $data->getComplicacion();
                        ?>

                        <div class="form-group col-md-3 col-lg-3 col-sm-12">
                            <label>ESTADO CIVIL</label>
                            <select id="estadoCivilE" name="estadoCivilE" class="form-control" required>
                            <option selected disabled>Seleccione una opción</option>
                                <?php
                                    foreach ($estadoCivil as $ec) {
                                        echo "<option value='".$ec->id_EstadoCivil."'>".$ec->nombre."</option>";
                                    }
                                ?> 
            
                            </select>
                        </div>

                        <div class="form-group col-md-3 col-lg-3 col-sm-12">
                            <label>COMUNA</label>
                            <select id="comunaE" name="comunaE" class="form-control" required>
                            <option selected disabled>Seleccione una opción</option>
                                <?php
                                    foreach($comuna as $c){
                                        echo "<option value='".$c->id_Comuna. "'>".$c->nombre."</option>";  
                                    }
                                ?>      
                            </select>
                        </div>

                        <div class="form-group col-md-3 col-lg-3 col-sm-12">
                            <label>ESTADO</label>
                            <select id="estadoE" name="estadoE" class="form-control" required>
                            <option selected disabled>Seleccione una opción</option>
                                <?php
                                    foreach($estado as $e){
                                        echo "<option value='".$e->id_Estado. "'>".$e->nombre."</option>";
                                    }
                                ?>      
                            </select>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="submit" name="btnEditarPaciente" class="btn btn-primary">Actualizar</button>
            </div>
            </div>
        </div>
    </div>

    <script src="../js/updatePaciente.js?ver=<?php echo filemtime('../js/updatePaciente.js');?>"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
  </body>
</html>
<?php exit();?>