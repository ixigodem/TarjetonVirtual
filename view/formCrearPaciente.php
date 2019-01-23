<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Crear Paciente</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
</head>
<body>
    <!-- Pagina inicial -->
    <nav class="navbar navbar-default navbar-expand-lg navbar-light">

    <!-- Collection of nav links, forms, and other content for toggling -->
    <div id="navbarCollapse" class="collapse navbar-collapse justify-content-start">
      <ul class="nav navbar-nav">
        <li><a class="navbar-brand" href="../index.php">
          <img src="../img/Enfermeria.png" width="30" height="30" class="d-inline-block align-top" alt="">Tarjetón Virtual</a></li>

          <div class="dropdown show">
            <a class="btn btn-info dropdown-toggle" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Creación de Paciente
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
              <a class="dropdown-item" href="formCrearPaciente.php">Crear Paciente</a>
              <a class="dropdown-item" href="#">Buscar Paciente</a>
            </div>
          </div>

          <div class="dropdown show">
            <a class="btn btn-info dropdown-toggle" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Programa de Salud
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
              <a class="dropdown-item" href="#">Crear Programa de Salud</a>
              <a class="dropdown-item" href="#">Buscar Programa de Salud</a>
            </div>
          </div>

          <div class="dropdown show">
            <a class="btn btn-info dropdown-toggle" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Tarjetón
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
              <a class="dropdown-item" href="#">Crear Tarjetón</a>
              <a class="dropdown-item" href="#">Busqueda de tarjetones</a>
            </div>
          </div>
          
          <div class="dropdown show">
            <a class="btn btn-info dropdown-toggle" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Gestión
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
              <a class="dropdown-item" href="#">Reporte Tarjetón</a>
              <a class="dropdown-item" href="#">Control HTA</a>
              <a class="dropdown-item" href="#">Control DM2</a>
              <a class="dropdown-item" href="#">Control Epilepsia</a>
            </div>
          </div>
            <!-- Boton Volver -->
            <button type="button" class="btn btn-info" href="http://web.saludcormun.cl/?page_id=3733" class="nav-link">Acerca de</button>
		</li>
      </ul>
    </div>
  </nav>

  <!-- Form para crear pacientes -->
    <form action="../controller/crearPaciente.php" method="POST">
        <div class="form-row">
            <div class="form-group col-md-2">
                <label for="run">RUN</label>
                <input type="text" class="form-control" name="run" onkeyup="checkRun(this)" placeholder="Ej. 11222333-4" maxlength="10">
            </div>
            <div class="form-group col-md-4">
                <label for="nombres">NOMBRES</label>
                <input type="text" class="form-control" name="nombres" placeholder="Nombre del Paciente:" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
            </div>
            <div class="form-group col-md-4">
                <label for="apellidoPaterno">APELLIDO PATERNO</label>
                <input type="text" class="form-control" name="apellidoPaterno" placeholder="Apellido Paterno del Paciente:" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
            </div>
            <div class="form-group col-md-4">
                <label for="apellidoMaterno">APELLIDO MATERNO</label>
                <input type="text" class="form-control" name="apellidoMaterno" placeholder="Apellido Materno del Paciente:" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
            </div>

            <div class="form-group col-md-2">
                <label for="fechaNacimiento">FECHA DE NACIMIENTO</label>
                <input type="date" class="form-control" name="fechaNacimiento">
            </div>

            <div class="form-group col-md-4">
                <fieldset>
                    <legend>Sexo</legend>
                        <label>
                            <input type="radio" name="sexo" value="0" checked="checked"> Masculino
                        </label>
                        <label>
                            <input type="radio" name="sexo" value="1"> Femenino
                        </label>
                </fieldset>
            </div>

            <div class="form-group col-md-4">
                <label for="inputState">PARTICIPACIÓN SOCIAL</label>
                <select id="inputState" class="form-control" name="participacionSocial">
                    <option selected>NO TIENE</option>
                    <option>JUNTA DE VECINOS</option>
                    <option>VOLUNTARIADO</option>
                    <option>CLUB SOCIAL</option>
                    <option>ORGANIZACIONES SOCIALES</option>
                    <option>IGLESIA</option>
                </select>
            </div>

            <div class="form-group col-md-4">
                <label for="estudio">ESTUDIO</label>
                <select id="estudio" class="form-control" name="estudio">
                    <option selected>ENSEÑANZA BASICA</option>
                    <option>ENSEÑANZA MEDIA</option>
                    <option>ENSEÑANZA CENTRO DE FORMACIÓN TECNICA</option>
                    <option>ENSEÑANZA INSTITUTO PROFESIONAL</option>
                    <option>ENSEÑANZA UNIVERSITARIA</option>
                </select>
            </div>

            <div class="form-group col-md-6">
                <label for="actividadLaboral">ACTIVIDAD LABORAL</label>
                <input type="text" class="form-control" name="actividadLaboral" placeholder="Ingresar trabajo del paciente:" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
            </div>

            <div class="form-group col-md-6">
                <label for="direccionParticular">DIRECCIÓN PARTICULAR</label>
                <input type="text" class="form-control" name="direccionParticular" placeholder="Ej. Almarza #1061 - Rancagua" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
            </div>

        <!-- Obtengo los datos del Data que conecta con la BD -->
            <?php
                require_once("../model/Data.php");

                $d = new Data();

                $estado = $d->getEstado();
                $estadoCivil = $d->getEstadoCivil();
                $comuna = $d->getComuna();
            ?>

            <div class="form-group col-md-4">
                <label for="estado">ESTADO CIVIL</label>
                <select name="estadoCivil" class="form-control">
                    <?php
                        foreach($estadoCivil as $ec){
                            echo "<option value='".$ec->idEstadoCivil. "'>".$ec->nombreEstadoCivil."</option>";  
                        }
                    ?>      
                </select>
            </div>

            <div class="form-group col-md-4">
                <label for="estado">COMUNA</label>
                <select name="comuna" class="form-control">
                    <?php
                        foreach($comuna as $c){
                            echo "<option value='".$c->idComuna. "'>".$c->nombreComuna."</option>";  
                        }
                    ?>      
                </select>
            </div>

            <div class="form-group col-md-4">
                <label>ESTADO</label>
                <select name="estado" class="form-control">
                    <?php
                        foreach($estado as $e){
                            echo "<option value='".$e->idEstado. "'>".$e->nombreEstado."</option>";  
                        }
                    ?>      
                </select>
            </div>

            <button type="submit" class="btn btn-primary" name="btnCrearPaciente">Crear Paciente</button>
        </div>
        <script src="../js/crearPaciente.js"></script>
    </form>

    <div id="mensaje">
        <?php
            if(isset($_GET["err"])){
                $err = $_GET["err"];

                if($err == 1){
                    echo "Debe registrar con el botón";
                }
            }else if(isset($_GET["men"])){
                $men = $_GET["men"];

                if($men == 1){
                    echo "Actor creado exitósamente";
                }
            }   
        ?>
    </div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
</html>