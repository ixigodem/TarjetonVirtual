<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Crear Tarjeton</title>
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

<!-- Formulario de busqueda de paciente -->
    <nav class="navbar navbar-light bg-light">
        <form id="formGetPaciente" method="POST" class="form-inline">
            <input class="form-control mr-sm-2" name="txtRun" id="txtRun" value="17504702-6"
            onkeyup="checkRun(this)" placeholder="Ej. 11222333-4" maxlength="10">
            <button class="btn btn-outline-success my-2 my-sm-0" name="btnBuscarPaciente" type="submit">Buscar Paciente</button>
            <input class="btn btn-primary" type="reset" value="Limpiar" onclick="clearForm()">
        </form>
    </nav>
<!-- Formulario de busqueda de paciente -->

<!-- Tabla de la busqueda Paciente -->
    <div class="table-responsive">
        <table class="table table-hover">
            <thead class="thead-light" id="tituloTablaPaciente"></thead>
            <tbody id="cuerpoTablaPaciente"></tbody>
        </table>
    </div>
<!-- Tabla de la busqueda Paciente -->

<!-- Modal Crear Atención-->
    <div class="modal fade" id="seccionCreateNewTarjeton" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Nueva Atención</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form method="POST" action="../controller/createAtencion.php" id="form-normal">
            <div class="row" style="display:visible" id="">

                    <div class="form-group col-md-3 col-lg-3 col-sm-12">
                        <label>FECHA ATENCIÓN</label>
                        <input type="date" class="form-control" name="fechaAtencion" id="fechaAtencion" required>
                    </div>

                    <?php
                        require_once("../model/Data.php");
                        $data = new Data();

                        $profesional = $data->getProfesional();
                        $listadoExamen = $data->getListadoExamen();
                    ?>

                    <div class="form-group col-md-3 col-lg-3 col-sm-12">
                        <label>PROFESIONAL</label>
                        <select class="form-control" name="profesional" id="profesional" required>
                            <option selected disabled>Seleccione una opción</option>
                            <?php
                                foreach($profesional as $p){
                                    echo "<option value='".$p->id_Profesional."'>".$p->nombre."</option>";
                                }                       
                            ?>
                        </select>
                    </div>

                
                    <div class="form-group col-md-6 col-lg-6 col-sm-12">
                        <label>OBSERVACIÓN</label>
                        <input type="text" class="form-control" name="txtObservacion" id="txtObservacion" placeholder="Observación" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                    </div>

                    <div class="form-group col-md-3 col-lg-3 col-sm-12">
                        <label>PESO</label>
                        <input type="number" class="form-control" name="txtPeso" id="peso" placeholder="Ej: 80" required>
                    </div>
                
                    <div class="form-group col-md-3 col-lg-3 col-sm-12">
                        <label>TALLA</label>
                        <input type="number" class="form-control" name="txtTalla" id="altura" onkeyup="calc_imc()" placeholder="Ej: 170" required>
                    </div>
                
                    <div class="form-group col-md-3 col-lg-3 col-sm-12">
                        <label>INDICE DE MASA CORPORAL</label>
                        <input type="text" class="form-control" name="txtIMC" id="IMC" placeholder="Ej: 11,70" readonly>
                    </div>

                    <div class="form-group col-md-3 col-lg-3 col-sm-12">
                        <label>DIAGNOSTICO NUTRICIONAL</label>
                        <input type="text" class="form-control" name="diagnosticoNutricional" id="dgNutricional" placeholder="Ej: Obeso" readonly><div id="errorIMC"></div>
                    </div>

                    <div class="form-group col-md-3 col-lg-3 col-sm-12">
                        <label>PRESIÓN ARTERIAL SISTOLICA</label>
                        <input type="number" class="form-control" name="txtPaSistolica" id="txtPaSistolica" placeholder="Ej: 130" required>
                    </div>

                    <div class="form-group col-md-3 col-lg-3 col-sm-12">
                        <label>PRESIÓN ARTERIAL DISTOLICA</label>
                        <input type="number" class="form-control" name="txtPaDistolica" id="txtPaDistolica" placeholder="Ej: 64" required>
                    </div>

                    <div class="form-group col-md-3 col-lg-3 col-sm-12">
                        <label>CIRCUNFERENCIA</label>
                        <input type="number" class="form-control" name="txtCircunferencia" id="txtCircunferencia" placeholder="Ej: 102" required>
                    </div>
                    
                    <input type="hidden" name="jsonExamenes" id="jsonExamenes"> 

                    <!-- Aqui se ingresa los examenes -->
                    <div class="form-group row" id="examenes">
                        <div class="form-group col-md-3 col-lg-3 col-sm-12">
                            <label>FECHA EXAMEN</label>
                            <input type="date" class="form-control" name="fechaExamen" id="fechaExamen" required>
                        </div>
                        
                        <div class="form-group col-md-6 col-lg-6 col-sm-12">
                            <label>LISTADO DE EXAMENES</label>
                            <select class="form-control" name="listadoExamen" id="listadoExamen" required>
                                <option selected disabled>Seleccione una opción</option>
                                <?php 
                                    foreach ($listadoExamen as $le) {
                                        echo "<option value='".$le->id_ListaExamen."'>".$le->nombreExamen."</option>";
                                    }
                                ?>
                            </select>
                        </div>
                    
                        <div class="form-group col-md-3 col-lg-3 col-sm-12">
                            <label>VALOR DEL EXAMEN</label>
                            <input type="number" class="form-control" name="txtValorExamen" id="txtValorExamen" placeholder="Ej: 102" required>
                        </div>

                        <div class="form-group col-md-1 col-lg-1 col-sm-12">
                            <button type="button" id="btnAgregarExamen" class="btn btn-success btn-circle btn-xl">+</button>
                        </div>
                    </div>
                    <!-- Aqui se ingresa los examenes -->

                    <!-- Aquí va la respuesta del JS de examenes -->
                    <div class="table-responsive">
                        <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">FECHA EXAMEN</th>
                                <th scope="col">ID</th>
                                <th scope="col">NOMBRE EXAMEN</th>
                                <th scope="col">VALOR EXAMEN</th>
                            </tr>
                        </thead>
                            <tbody id="respuesta"><div id="mensajeError"></div></tbody>
                        </table>
                    </div>
                    <!-- Aquí va la respuesta del JS de examenes -->

                    <div class="form-group col-md-3 col-lg-3 col-sm-12">
                        <label>FECHA EVALUACIÓN PIE DIABETICO</label>
                        <input type="date" class="form-control" name="fechaEvPieDiabetico" id="fechaEvPieDiabetico" required>
                    </div>

                    <div class="form-group col-md-3 col-lg-3 col-sm-12">
                        <label>PUNTAJE PIE DIABETICO</label>
                        <input type="number" class="form-control" name="txtPjPieDiabetico" id="txtPjPieDiabetico" placeholder="Ej: 102" required>
                    </div>

                    <div class="form-group col-md-3 col-lg-3 col-sm-12">
                        <label>FECHA QUALIDIAB</label>
                        <input type="date" class="form-control" name="fechaQualidab" id="fechaQualidiab" required>
                    </div>

                    <div class="form-group col-md-3 col-lg-3 col-sm-12">
                        <label>QUALIDIAB</label>
                        <input type="number" class="form-control" name="txtQualidiab" id="txtQualidiab" placeholder="Ej: 102" required>
                    </div>

                    <div class="form-group col-md-3 col-lg-3 col-sm-12">
                        <label>FECHA DEL FONDO DE OJO</label>
                        <input type="date" class="form-control" name="fechaFondoOjo" id="fechaFondoOjo" required>
                    </div>
                    
                    <div class="form-group col-md-3 col-lg-3 col-sm-12">
                        <label>RESULTADO DEL FONDO DE OJO</label>
                        <select class="form-control" name="resultadoFondoOjo" id="resultadoFondoOjo" required>
                            <option selected disabled>Seleccione una opción</option>
                            <option value="0">NORMAL</option>
                            <option value="1">ALTERADO</option>
                        </select>
                    </div>

                    <div class="form-group col-md-3 col-lg-3 col-sm-12">
                        <label>ENALAPRIL</label>
                        <select class="form-control" name="enalapril" id="enalapril" required>
                            <option selected disabled>Seleccione una opción</option>
                            <option value="0">SI</option>
                            <option value="1">NO</option>
                        </select>
                    </div>

                    <div class="form-group col-md-3 col-lg-3 col-sm-12">
                        <label>LOSARTAN</label>
                        <select class="form-control" name="losartan" id="losartan" required>
                            <option selected disabled>Seleccione una opción</option>
                            <option value="0">SI</option>
                            <option value="1">NO</option>
                        </select>
                    </div>

                    <div class="form-group col-md-3 col-lg-3 col-sm-12">
                        <label>RETINOPATIA DIABETICA</label>
                        <select class="form-control" name="retinopatiaDiabetica" id="retinopatiaDiabetica" required>
                            <option selected disabled>Seleccione una opción</option>
                            <option value="0">SI</option>
                            <option value="1">NO</option>
                        </select>
                    </div>

                    <div class="form-group col-md-3 col-lg-3 col-sm-12">
                        <label>AMPUTACIÓN</label>
                        <select class="form-control" name="amputacion" id="amputacion" required>
                            <option selected disabled>Seleccione una opción</option>
                            <option value="0">SI</option>
                            <option value="1">NO</option>
                        </select>
                    </div>

                    <div class="form-group col-md-3 col-lg-3 col-sm-12">
                        <label>INSUFICIENCIA RENAL</label>
                        <select class="form-control" name="insuficienciaRenal" id="insuficienciaRenal" required>
                            <option selected disabled>Seleccione una opción</option>
                            <option value="0">SI</option>
                            <option value="1">NO</option>
                        </select>
                    </div>

                    <div class="form-group col-md-3 col-lg-3 col-sm-12">
                        <label>IAM</label>
                        <select class="form-control" name="iam" id="iam" required>
                            <option selected disabled>Seleccione una opción</option>
                            <option value="0">SI</option>
                            <option value="1">NO</option>
                        </select>
                    </div>
                    
                    <div class="form-group col-md-3 col-lg-3 col-sm-12">
                        <label>ACCIDENTE CEREBRO VASCULAR</label>
                        <select id="inputState" class="form-control" name="acv" id="acv" required>
                            <option selected disabled>Seleccione una opción</option>
                            <option value="0">SI</option>
                            <option value="1">NO</option>
                        </select>
                    </div>

                    <div class="form-group col-md-3 col-lg-3 col-sm-12">
                        <label>ESTATINA</label>
                        <select class="form-control" name="estatinas" id="estatinas" required>
                            <option selected disabled>Seleccione una opción</option>
                            <option value="0">SI</option>
                            <option value="1">NO</option>
                        </select>
                    </div>

                    <div class="form-group col-md-3 col-lg-3 col-sm-12">
                        <label>AAS 100</label>
                        <select class="form-control" name="aas100" id="aas100" required>
                            <option selected disabled>Seleccione una opción</option>
                            <option value="0">SI</option>
                            <option value="1">NO</option>
                        </select>
                    </div>

                    <div class="form-group col-md-3 col-lg-3 col-sm-12">
                        <label>AUTOVALENTE</label>
                        <select class="form-control" name="autovalente" id="autovalente" required>
                            <option selected disabled>Seleccione una opción</option>
                            <option value="0">SI</option>
                            <option value="1">NO</option>
                        </select>
                    </div>

                    <div class="form-group col-md-3 col-lg-3 col-sm-12">
                        <label>AUTOVALENTE CON RIESGO</label>
                        <select class="form-control" name="autovalenteConRiesgo" id="autovalenteConRiesgo" required>
                            <option selected disabled>Seleccione una opción</option>
                            <option value="0">SI</option>
                            <option value="1">NO</option>
                        </select>
                    </div>

                    <div class="form-group col-md-3 col-lg-3 col-sm-12">
                        <label>RIESGO DE DEPENDENCIA</label>
                        <select class="form-control" name="riesgoDependecia" id="riesgoDependencia" required>
                            <option selected disabled>Seleccione una opción</option>
                            <option value="0">SI</option>
                            <option value="1">NO</option>
                        </select>
                    </div>
                
                    <div class="form-group col-md-3 col-lg-3 col-sm-12">
                        <label>DEPENDENCIA</label>
                        <select class="form-control" name="dependencia" id="dependencia" required>
                            <option selected disabled>Seleccione una opción</option>
                            <option value="0">SI</option>
                            <option value="1">NO</option>
                        </select>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="submit" name="btnCrearAtencion" class="btn btn-primary">Enviar</button>
            </div>
        </form>
        </div>
        </div>
    </div>
    </div>
<!--Fin del Modal Crear Atención-->

<!-- Modal para editar Tarjetón -->
    <div class="modal fade" id="editarTarjeton" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="editarTarjetonTitle">Editar Atención</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form method="POST" action="../controller/updateAtencion.php" id="form-normal">
            <div class="row" style="display:visible" id="">
                    <div class="form-group col-md-3 col-lg-3 col-sm-12">
                        <label>FECHA ATENCIÓN</label>
                        <input type="date" class="form-control" name="fechaAtencionE" id="fechaAtencionE" required>
                    </div>

                    <?php
                        $data = new Data();

                        $profesional = $data->getProfesional();
                        $listadoExamen = $data->getListadoExamen();
                    ?>

                    <div class="form-group col-md-3 col-lg-3 col-sm-12">
                        <label>PROFESIONAL</label>
                        <select class="form-control" name="profesionalE" id="profesionalE" required>
                            <option selected disabled>Seleccione una opción</option>
                            <?php
                                foreach($profesional as $p){
                                    echo "<option value='".$p->id_Profesional."'>".$p->nombre."</option>";
                                }                       
                            ?>
                        </select>
                    </div>

                
                    <div class="form-group col-md-6 col-lg-6 col-sm-12">
                        <label>OBSERVACIÓN</label>
                        <input type="text" class="form-control" name="observacionE" id="observacionE" placeholder="Observación" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                    </div>

                    <div class="form-group col-lg-3 col-md-3 col-sm-12">
                        <label>PESO</label>
                        <input type="number" class="form-control" name="pesoE" id="pesoE" placeholder="Ej: 80" required>
                    </div>
                
                    <div class="form-group col-lg-3 col-md-3 col-sm-12">
                        <label>TALLA</label>
                        <input type="number" class="form-control" name="tallaE" id="tallaE" onkeyup="calc_imc()" placeholder="Ej: 170" required>
                    </div>
                
                    <div class="form-group col-md-3 col-lg-3 col-sm-12">
                        <label>INDICE DE MASA CORPORAL</label>
                        <input type="text" class="form-control" name="imcE" id="imcE" placeholder="Ej: 11,70" readonly>
                    </div>

                    <div class="form-group col-md-3 col-lg-3 col-sm-12">
                        <label>DIAGNOSTICO NUTRICIONAL</label>
                        <input type="text" class="form-control" name="diagnosticoNutricionalE" id="dgNutricional" placeholder="Ej: Obeso" readonly><div id="errorIMC"></div>
                    </div>

                    <div class="form-group col-md-3 col-lg-3 col-sm-12">
                        <label>PRESIÓN ARTERIAL SISTOLICA</label>
                        <input type="number" class="form-control" name="paSistolicaE" id="paSistolicaE" placeholder="Ej: 130" required>
                    </div>

                    <div class="form-group col-md-3 col-lg-3 col-sm-12">
                        <label>PRESIÓN ARTERIAL DISTOLICA</label>
                        <input type="number" class="form-control" name="paDistolicaE" id="paDistolicaE" placeholder="Ej: 64" required>
                    </div>

                    <div class="form-group col-md-3 col-lg-3 col-sm-12">
                        <label>CIRCUNFERENCIA</label>
                        <input type="number" class="form-control" name="circunferenciaE" id="circunferenciaE" placeholder="Ej: 102" required>
                    </div>
                    
                    <input type="hidden" name="jsonExamenes" id="jsonExamenes"> 

                    <!-- Aqui se ingresa los examenes -->
                    <div id="examenes" class="form-group row">
                    <div class="form-group col-md-3 col-lg-3 col-sm-12">
                            <label>FECHA EXAMEN</label>
                            <input type="date" class="form-control" name="fechaExamen" id="fechaExamen" required>
                        </div>
                        
                        <div class="form-group col-md-5 col-lg-5 col-sm-12">
                            <label>LISTADO DE EXAMENES</label>
                            <select class="form-control" name="listadoExamen" id="listadoExamen" required>
                                <option selected disabled>Seleccione una opción</option>
                                <?php 
                                    foreach ($listadoExamen as $le) {
                                        echo "<option value='".$le->id_ListaExamen."'>".$le->nombreExamen."</option>";
                                    }
                                ?>
                            </select>
                        </div>
                    
                        <div class="form-group col-md-3 col-lg-3 col-sm-12">
                            <label>VALOR DEL EXAMEN</label>
                            <input type="number" class="form-control" name="txtValorExamen" id="txtValorExamen" placeholder="Ej: 102" required>
                        </div>

                        <div class="form-group col-md-1 col-lg-1 col-sm-12">
                            <button type="button" id="btnAgregarExamen" class="btn btn-success btn-circle btn-xl">+</button>
                        </div>
                    </div>
                    <!-- Aqui se ingresa los examenes -->

                    <!-- Aquí va la respuesta del JS de examenes -->
                    <div class="table-responsive">
                        <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">FECHA EXAMEN</th>
                                <th scope="col">ID</th>
                                <th scope="col">NOMBRE EXAMEN</th>
                                <th scope="col">VALOR EXAMEN</th>
                            </tr>
                        </thead>
                            <tbody id="respuesta"><div id="mensajeError"></div></tbody>
                        </table>
                    </div>
                    <!-- Aquí va la respuesta del JS de examenes -->

                    <div class="form-group col-md-3 col-lg-3 col-sm-12">
                        <label>FECHA EVALUACIÓN PIE DIABETICO</label>
                        <input type="date" class="form-control" name="fechaEvPieDiabeticoE" id="fechaEvPieDiabeticoE" required>
                    </div>

                    <div class="form-group col-md-3 col-lg-3 col-sm-12">
                        <label>PUNTAJE PIE DIABETICO</label>
                        <input type="number" class="form-control" name="ptjePieDiabeticoE" id="ptjePieDiabeticoE" placeholder="Ej: 102" required>
                    </div>

                    <div class="form-group col-md-3 col-lg-3 col-sm-12">
                        <label>FECHA QUALIDIAB</label>
                        <input type="date" class="form-control" name="fechaQualidabE" id="fechaQualidiabE" required>
                    </div>

                    <div class="form-group col-md-3 col-lg-3 col-sm-12">
                        <label>QUALIDIAB</label>
                        <input type="number" class="form-control" name="qualidiabE" id="qualidiabE" placeholder="Ej: 102" required>
                    </div>

                    <div class="form-group col-md-3 col-lg-3 col-sm-12">
                        <label>FECHA DEL FONDO DE OJO</label>
                        <input type="date" class="form-control" name="fechaFondoOjoE" id="fechaFondoOjoE" required>
                    </div>
                    
                    <div class="form-group col-md-3 col-lg-3 col-sm-12">
                        <label>RESULTADO DEL FONDO DE OJO</label>
                        <select class="form-control" name="resultadoFondoOjoE" id="resultadoFondoOjoE" required>
                            <option selected disabled>Seleccione una opción</option>
                            <option value="0">NORMAL</option>
                            <option value="1">ALTERADO</option>
                        </select>
                    </div>

                    <div class="form-group col-md-3 col-lg-3 col-sm-12">
                        <label>ENALAPRIL</label>
                        <select class="form-control" name="enalaprilE" id="enalaprilE" required>
                            <option selected disabled>Seleccione una opción</option>
                            <option value="0">SI</option>
                            <option value="1">NO</option>
                        </select>
                    </div>

                    <div class="form-group col-md-3 col-lg-3 col-sm-12">
                        <label>LOSARTAN</label>
                        <select class="form-control" name="losartanE" id="losartanE" required>
                            <option selected disabled>Seleccione una opción</option>
                            <option value="0">SI</option>
                            <option value="1">NO</option>
                        </select>
                    </div>

                    <div class="form-group col-md-3 col-lg-3 col-sm-12">
                        <label>RETINOPATIA DIABETICA</label>
                        <select class="form-control" name="retinopatiaDiabeticaE" id="retinopatiaDiabeticaE" required>
                            <option selected disabled>Seleccione una opción</option>
                            <option value="0">SI</option>
                            <option value="1">NO</option>
                        </select>
                    </div>

                    <div class="form-group col-md-3 col-lg-3 col-sm-12">
                        <label>AMPUTACIÓN</label>
                        <select class="form-control" name="amputacionE" id="amputacionE" required>
                            <option selected disabled>Seleccione una opción</option>
                            <option value="0">SI</option>
                            <option value="1">NO</option>
                        </select>
                    </div>

                    <div class="form-group col-md-3 col-lg-3 col-sm-12">
                        <label>INSUFICIENCIA RENAL</label>
                        <select class="form-control" name="insuficienciaRenalE" id="insuficienciaRenalE" required>
                            <option selected disabled>Seleccione una opción</option>
                            <option value="0">SI</option>
                            <option value="1">NO</option>
                        </select>
                    </div>

                    <div class="form-group col-md-3 col-lg-3 col-sm-12">
                        <label>IAM</label>
                        <select class="form-control" name="iamE" id="iamE" required>
                            <option selected disabled>Seleccione una opción</option>
                            <option value="0">SI</option>
                            <option value="1">NO</option>
                        </select>
                    </div>
                    
                    <div class="form-group col-md-3 col-lg-3 col-sm-12">
                        <label>ACCIDENTE CEREBRO VASCULAR</label>
                        <select id="inputState" class="form-control" name="acvE" id="acvE" required>
                            <option selected disabled>Seleccione una opción</option>
                            <option value="0">SI</option>
                            <option value="1">NO</option>
                        </select>
                    </div>

                    <div class="form-group col-md-3 col-lg-3 col-sm-12">
                        <label>ESTATINA</label>
                        <select class="form-control" name="estatinasE" id="estatinasE" required>
                            <option selected disabled>Seleccione una opción</option>
                            <option value="0">SI</option>
                            <option value="1">NO</option>
                        </select>
                    </div>

                    <div class="form-group col-md-3 col-lg-3 col-sm-12">
                        <label>AAS 100</label>
                        <select class="form-control" name="aas100E" id="aas100E" required>
                            <option selected disabled>Seleccione una opción</option>
                            <option value="0">SI</option>
                            <option value="1">NO</option>
                        </select>
                    </div>

                    <div class="form-group col-md-3 col-lg-3 col-sm-12">
                        <label>AUTOVALENTE</label>
                        <select class="form-control" name="autovalenteE" id="autovalenteE" required>
                            <option selected disabled>Seleccione una opción</option>
                            <option value="0">SI</option>
                            <option value="1">NO</option>
                        </select>
                    </div>

                    <div class="form-group col-md-3 col-lg-3 col-sm-12">
                        <label>AUTOVALENTE CON RIESGO</label>
                        <select class="form-control" name="autovalenteConRiesgoE" id="autovalenteConRiesgoE" required>
                            <option selected disabled>Seleccione una opción</option>
                            <option value="0">SI</option>
                            <option value="1">NO</option>
                        </select>
                    </div>

                    <div class="form-group col-md-3 col-lg-3 col-sm-12">
                        <label>RIESGO DE DEPENDENCIA</label>
                        <select class="form-control" name="riesgoDependeciaE" id="riesgoDependenciaE" required>
                            <option selected disabled>Seleccione una opción</option>
                            <option value="0">SI</option>
                            <option value="1">NO</option>
                        </select>
                    </div>
                
                    <div class="form-group col-md-3 col-lg-3 col-sm-12">
                        <label>DEPENDENCIA</label>
                        <select class="form-control" name="dependenciaE" id="dependenciaE" required>
                            <option selected disabled>Seleccione una opción</option>
                            <option value="0">SI</option>
                            <option value="1">NO</option>
                        </select>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="submit" name="btnCrearAtencion" class="btn btn-primary">Enviar</button>
            </div>
        </form>
        </div>
        </div>
    </div>
    </div>
<!-- Fin modal para editar tarjetón -->
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead id="tituloTablaTarjeton"></thead>
            <tbody id="cuerpoTablaTarjeton"></tbody>
        </table>
    </div>

    <script src="./res/js/programacion/centro.js?ver=<?php echo filemtime('./res/js/programacion/centro.js'); ?>"></script>

    <script src="../js/validadorRun.js?ver=<?php echo filemtime('../js/validadorRun.js');?>"></script>
    <script src="../js/obtenerTarjeton.js?ver=<?php echo filemtime('../js/obtenerTarjeton.js');?>"></script>
    <script src="../js/updateTarjeton.js?ver=<?php echo filemtime('../js/updateTarjeton.js');?>"></script>
    <script src="../js/crearTarjeton.js?ver=<?php echo filemtime('../js/crearTarjeton.js');?>"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
</html>
<?php
function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
?>