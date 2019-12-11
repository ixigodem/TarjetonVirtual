<?php 
  @session_start(); 
  include("../controller/Seguridad.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Crear Paciente</title>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
    <meta id="viewport" content="width=device-width, initial-scale=1">
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
                <a class="dropdown-item" href="formGestion.php">Reporte Tarjetón</a>
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
    <form action="../controller/crearPaciente.php" method="POST" id="form-normal">
        <div class="form-row">
            <div class="form-group col-md-3 col-lg-3 col-sm-12">
                <label for="run">RUN</label>
                <input type="text" class="form-control" id="run" name="run" onkeyup="checkRun(this)" placeholder="Ej. 11222333-4" maxlength="10" required>
            </div>
            <div class="form-group col-md-3 col-lg-3 col-sm-12">
                <label for="nombres">NOMBRES</label>
                <input type="text" class="form-control" name="nombres" placeholder="Nombre del Paciente:" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
            </div>
            <div class="form-group col-md-3 col-lg-3 col-sm-12">
                <label for="apellidoPaterno">APELLIDO PATERNO</label>
                <input type="text" class="form-control" name="apellidoPaterno" placeholder="Apellido Paterno del Paciente:" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
            </div>
            <div class="form-group col-md-3 col-lg-3 col-sm-12">
                <label for="apellidoMaterno">APELLIDO MATERNO</label>
                <input type="text" class="form-control" name="apellidoMaterno" placeholder="Apellido Materno del Paciente:" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
            </div>

            <div class="form-group col-md-3 col-lg-3 col-sm-12">
                <label for="fechaNacimiento">FECHA DE NACIMIENTO</label>
                <input type="date" class="form-control" name="fechaNacimiento" required>
            </div>

            <div class="form-group col-md-2 col-lg-2 col-sm-12">
                <fieldset>
                    <label>SEXO</label>
                    <br>
                        <p>
                        <label>
                            <input type="radio" name="sexo" value="0" checked="checked"> 
                            <span>Masculino</span>
                        </label>
                        </p>
                        <p>
                        <label>
                            <input type="radio" name="sexo" value="1"> 
                            <span>Femenino</span>
                        </label>
                        </p>
                </fieldset>
            </div>

            <div class="form-group col-md-3 col-lg-3 col-sm-12">
                <label for="inputState">PARTICIPACIÓN SOCIAL</label>
                <select id="inputState" class="form-control" name="participacionSocial" required>
                    <option selected disabled>Seleccione una opción</option>
                    <option>NO TIENE</option>
                    <option>JUNTA DE VECINOS</option>
                    <option>VOLUNTARIADO</option>
                    <option>CLUB SOCIAL</option>
                    <option>ORGANIZACIONES SOCIALES</option>
                    <option>IGLESIA</option>
                </select>
            </div>

            <div class="form-group col-md-3 col-lg-3 col-sm-12">
                <label for="estudio">ESTUDIO</label>
                <select id="estudio" class="form-control" name="estudio" required>
                    <option selected disabled>Seleccione una opción</option>
                    <option>ENSEÑANZA BASICA</option>
                    <option>ENSEÑANZA MEDIA</option>
                    <option>ENSEÑANZA CENTRO DE FORMACIÓN TECNICA</option>
                    <option>ENSEÑANZA INSTITUTO PROFESIONAL</option>
                    <option>ENSEÑANZA UNIVERSITARIA</option>
                </select>
            </div>

            <div class="form-group col-md-3 col-lg-3 col-sm-12">
                <label for="actividadLaboral">TELEFONO</label>
                <input type="telefono" class="form-control" name="telefono" placeholder="+56987654321" pattern="(+[0-9]{3}) [0-9]{3} [0-9]{2} [0-9]{3}" title="Use el formato +56987654321" maxlength="12" required>
            </div>

            <div class="form-group col-md-4 col-lg-4 col-sm-12">
                <label for="actividadLaboral">ACTIVIDAD LABORAL</label>
                <input type="text" class="form-control" name="actividadLaboral" placeholder="Ingresar trabajo del paciente:" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
            </div>

            <div class="form-group col-md-4 col-lg-4 col-sm-12">
                <label for="direccionParticular">DIRECCIÓN PARTICULAR</label>
                <input type="text" class="form-control" name="direccionParticular" placeholder="Ej. Almarza #1061 - Rancagua" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
            </div>

            <div class="form-group col-md-3 col-lg-3 col-sm-12">
                <label for="sector">SECTOR</label>
                <select id="sector" class="form-control" name="sector" required>
                    <option selected disabled>Seleccione una opción</option>
                    <option>AMARILLO</option>
                    <option>VERDE</option>
                    <option>AZUL</option>
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
                <select name="estadoCivil" class="form-control" required>
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
                <select name="comuna" class="form-control" required>
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
                <select name="estado" class="form-control" required>
                <option selected disabled>Seleccione una opción</option>
                    <?php
                        foreach($estado as $e){
                            echo "<option value='".$e->id_Estado. "'>".$e->nombre."</option>";
                        }
                    ?>      
                </select>
            </div>

            <input type="hidden" name="jsonPatologias" id="jsonPatologias">
            <input type="hidden" name="jsonComplicaciones" id="jsonComplicaciones">

             <!-- Crear patologias -->
            <div id="formPatologia" class="form-group col-md-6 col-lg-6 col-sm-12">
                <div class="form-group col-md-3 col-lg-3 col-sm-12">
                    <label for="fechaDiagnostico">FECHA DE DIAGNOSTICO</label>
                    <input type="date" name="fechaPatologias" id="fechaPatologias" required>
                </div>
                
                <div class="form-group col-md-6 col-lg-6 col-sm-12">
                    <label>PATOLOGIA</label>
                    <select name="Patologia_ID" id="Patologia_ID" class="form-control" required>
                        <option selected disabled>Seleccione una opción</option>
                            <?php
                                foreach($patologia as $p){
                                    echo "<option value='".$p->id_Patologia."'>".$p->nombre."</option>";
                                }
                            ?>      
                    </select>
                </div>

                <div class="form-group col-md-1 col-lg-1 col-sm-12">
                <button type="button" id="btnAgregarPatologia" class="btn btn-success btn-circle btn-xl">+</button>
                </div>
            </div>
            
            <!-- Crear complicaciones -->
            <div id="formComplicacion" class="form-group col-md-6 col-lg-6 col-sm-12">
                <div class="form-group col-md-3 col-lg-3 col-sm-12">
                    <label for="fechaDiagnostico">FECHA DE COMPLICACIONES</label>
                    <input type="date" name="fechaComplicacion" id="fechaComplicacion" required>
                </div>
                
                <div class="form-group col-md-6 col-lg-6 col-sm-12">
                    <label>COMPLICACIÓN</label>
                    <select name="complicacion_ID" id="complicacion_ID" class="form-control" required>
                        <option selected disabled>Seleccione una opción</option>
                            <?php
                                foreach($complicacion as $c){
                                    echo "<option value='".$c->id_Complicacion."'>".$c->nombre."</option>";
                                }
                            ?>      
                    </select>
                </div>

                <div class="form-group col-md-1 col-lg-1 col-sm-12">
                <button type="button" id="btnAgregarComplicacion" class="btn btn-success btn-circle btn-xl">+</button>
                </div>
            </div>

            <!-- Aquí va la respuesta del JS  -->
            <div class="table-responsive" class="form-group col-md-6 col-lg-6 col-sm-12">
                <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Patologias Ingresadas</th>
                    </tr>
                </thead>
                    <tbody id="respuesta"><div id="mensajeError"></div></tbody>
                </table>
            </div>
            <!-- Crear patologias -->

            <!-- Aquí va la respuesta del JS  -->
            <div class="table-responsive" class="form-group col-md-6 col-lg-6 col-sm-12">
                <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Complicaciones Ingresadas</th>
                    </tr>
                </thead>
                    <tbody id="respuestaComplicacion"><div id="mensajeErrorComplicacion"></div></tbody>
                </table>
            </div>
            
            <div class="form-group col-md-3">
                <button class="btn btn-primary" name="btnCrearPaciente">Crear Paciente</button>
            </div>
        </div>

        <script src="../js/validadorRun.js?ver=<?php echo filemtime('../js/validadorRun.js');?>"></script>
        <script src="../js/crearPatologia.js?ver=<?php echo filemtime('../js/crearPatologia.js');?>"></script>
        <script src="../js/crearComplicacion.js?ver=<?php echo filemtime('../js/crearComplicacion.js');?>"></script>
    </form>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
</html>
<?php exit(); ?>