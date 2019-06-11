<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Crear Paciente</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
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
    <!-- Import jquery -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
<?php session_start(); ?>
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

  <!-- Form para crear pacientes -->
    <form action="../controller/crearPaciente.php" method="POST" id="form-normal">
        <div class="form-row">
            <div class="form-group col-md-2">
                <label for="run">RUN</label>
                <input type="text" class="form-control" id="run" name="run" onkeyup="checkRun(this)" placeholder="Ej. 11222333-4" maxlength="10" required>
            </div>
            <div class="form-group col-md-3">
                <label for="nombres">NOMBRES</label>
                <input type="text" class="form-control" name="nombres" placeholder="Nombre del Paciente:" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
            </div>
            <div class="form-group col-md-3">
                <label for="apellidoPaterno">APELLIDO PATERNO</label>
                <input type="text" class="form-control" name="apellidoPaterno" placeholder="Apellido Paterno del Paciente:" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
            </div>
            <div class="form-group col-md-3">
                <label for="apellidoMaterno">APELLIDO MATERNO</label>
                <input type="text" class="form-control" name="apellidoMaterno" placeholder="Apellido Materno del Paciente:" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
            </div>

            <div class="form-group col-md-2">
                <label for="fechaNacimiento">FECHA DE NACIMIENTO</label>
                <input type="date" class="form-control" name="fechaNacimiento" required>
            </div>

            <div class="form-group col-md-2">
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

            <div class="form-group col-md-3">
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

            <div class="form-group col-md-4">
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

            <div class="form-group col-md-2">
                <label for="actividadLaboral">TELEFONO</label>
                <input type="telefono" class="form-control" name="telefono" placeholder="+56987654321" pattern="(+[0-9]{3}) [0-9]{3} [0-9]{2} [0-9]{3}" title="Use el formato +56987654321" maxlength="12" required>
            </div>

            <div class="form-group col-md-4">
                <label for="actividadLaboral">ACTIVIDAD LABORAL</label>
                <input type="text" class="form-control" name="actividadLaboral" placeholder="Ingresar trabajo del paciente:" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
            </div>

            <div class="form-group col-md-4">
                <label for="direccionParticular">DIRECCIÓN PARTICULAR</label>
                <input type="text" class="form-control" name="direccionParticular" placeholder="Ej. Almarza #1061 - Rancagua" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
            </div>

            <div class="form-group col-md-3">
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
                
           ?>

            <div class="form-group col-md-3">
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

            <div class="form-group col-md-3">
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

            <div class="form-group col-md-3">
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

             <!-- Crear patologias -->
            <div id="formPatologia" class="form-group col-md-3">
                <div class="form-group mb-3">
                    <label for="fechaDiagnostico">FECHA DE DIAGNOSTICO</label>
                    <input type="date" name="fechaPatologias" id="fechaPatologias" required>
                </div>
                
                <div class="form-group mb-3">
                    <label>PATOLOGIA</label>
                    <select name="Patologia_ID" id="Patologia_ID" class="form-control" required>
                        <option selected disabled>Seleccione una opción</option>
                            <?php
                                foreach($patologia as $p){
                                    echo "<option value='".$p->id_Patologia. "'>".$p->nombre."</option>";
                                }
                            ?>      
                    </select>
                </div>

                <div class="form-group mb-2">
                    <a id="btnAgregarPatologia" class="btn-floating btn-large waves-effect waves-light blue"><i class="material-icons">add</i></a>
                </div>
            </div>

            <!-- Aquí va la respuesta del JS  -->
            <div class="table-responsive">
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

            <div class="form-group col-md-3">
                <button class="btn btn-primary" name="btnCrearPaciente">Crear Paciente</button>
            </div>
        </div>
        <script src="../js/validadorRun.js"></script>
        <script src="../js/crearPatologia.js"></script>
    </form>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
</html>