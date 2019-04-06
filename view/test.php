
  <!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <body>
    
    <div class="parallax-container">
      <div class="parallax"><img src="../img/logoCesfam.jpg"></div>
    </div>
    <div class="section white">
      <div class="row container">
        <h2 class="header">Parallax</h2>
        <p class="grey-text text-darken-3 lighten-3">Parallax is an effect where the background content or image in this case, is moved at a different speed than the foreground content while scrolling.</p>
      </div>
    </div>
    <div class="parallax-container">
      <div class="parallax"><img src="../img/Enfermeria.png"></div>
    </div>

<div class="fixed-action-btn">
  <a class="btn-floating btn-large red">
    <i class="large material-icons">mode_edit</i>
  </a>
  <ul>
    <li><a class="btn-floating red"><i class="material-icons">insert_chart</i></a></li>
    <li><a class="btn-floating yellow darken-1"><i class="material-icons">format_quote</i></a></li>
    <li><a class="btn-floating green"><i class="material-icons">publish</i></a></li>
    <li><a class="btn-floating blue"><i class="material-icons">attach_file</i></a></li>
  </ul>
</div>




        <?php
        require_once("../model/Data.php");

        $data = new Data();

        $estadoCivil = $data->getEstadoCivil();
        $comuna = $data->getComuna();
        $estado = $data->getEstado();
        $patologia = $data->getPatologia();
    ?>
    <form id="formPatologia">
        <input type="date" name="fechaPatologia" id="fechaPatologia">
        <select name="patologia" id="idPatologia" class="form-control" required>
        <option selected disabled>Seleccione una opción</option>
            <?php
                foreach($patologia as $p){
                    echo "<option value='".$p->id_Patologia."'>".$p->nombre."</option>";
                }
            ?>
        </select>

  <a class="btn-floating btn-large waves-effect waves-light red"><i class="material-icons">add</i></a>
   
        <button onclick="cargarInformacion()">+</button>
    </form>

    <div class="card" style="width: 18rem;" id="respuesta">

    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.parallax');
            var instances = M.Parallax.init(elems, options);
        });
        var instance = M.Parallax.getInstance(elem);
        
instance.destroy();
      
    </script>

      <!--JavaScript at end of body for optimized loading-->
      <script type="text/javascript" src="../js/materialize.min.js"></script>
    </body>
  </html>