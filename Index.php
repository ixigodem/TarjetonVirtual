<?php @session_start(); ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
          <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      
    <title>Tarjetón Virtual</title>
  </head>
  <body>
    <!-- Pagina inicial -->
    <nav class="navbar navbar-default navbar-expand-lg navbar-light">

    <!-- Collection of nav links, forms, and other content for toggling -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="nav navbar-nav">
        <li><a class="navbar-brand" href="index.php">
          <img src="img/Enfermeria.png" width="30" height="30" class="d-inline-block align-top" alt="">
          Tarjetón Virtual
          </a></li>
        <li class="nav-item"><a href="index.php" class="nav-link">Inicio</a></li>
        <li class="nav-item"><a href="http://web.saludcormun.cl/?page_id=3733" class="nav-link">Acerca de</a></li>
      </ul>


      <ul class="nav navbar-nav navbar-left ml-auto">			
        <li class="nav-item">
          <a data-toggle="dropdown" class="nav-link dropdown-toggle">Inicio de Sesión</a>
          <ul class="dropdown-menu form-wrapper">					
            <li>
              <form action="controller/Control.php" method="post">
                <div class="form-group">
                  <input type="text" class="form-control" name="usuario" placeholder="Usuario:" required="required">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control" name="clave" placeholder="Clave:" required="required">
                </div>
                <input type="submit" class="btn btn-primary btn-block" value="Iniciar Sesión">
              </form>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
  
  <!-- Carrusel de fotos -->
  <div class="carousel">
    <a class="carousel-item" href="#one!"><img src="img/fotos/portadas.jpg"></a>
    <a class="carousel-item" href="#two!"><img src="img/fotos/portadas.jpg"></a>
    <a class="carousel-item" href="#three!"><img src="img/fotos/portadas2.jpg"></a>
    <a class="carousel-item" href="#four!"><img src="img/fotos/operativos1.jpg"></a>
    <a class="carousel-item" href="#five!"><img src="img/fotos/operativos2.jpg"></a>
    <a class="carousel-item" href="#six!"><img src="img/fotos/operativos3.jpg"></a>
    <a class="carousel-item" href="#seven!"><img src="img/fotos/operativos4.jpg"></a>
    <a class="carousel-item" href="#eight!"><img src="img/fotos/operativos5.jpg"></a>
  </div>

    <!-- <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel"> 
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1" ></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2" ></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="3" ></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active" data-interval="5000">
          <img src="img/fotos/portadas.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item" data-interval="5000">
          <img src="img/fotos/portadas1.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item" data-interval="5000">
          <img src="img/fotos/portadas2.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item" data-interval="5000" >
          <img src="img/fotos/operativos1.jpg" class="d-block w-100" alt="...">
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript">
	// Prevent dropdown menu from closing when click inside the form
	// $(document).on("click", ".navbar-right .dropdown-menu", function(e){
		// e.stopPropagation();
  // });

</script>
      <!--JavaScript at end of body for optimized loading-->
      <!-- <script type="text/javascript" src="js/materialize.min.js"></script> -->
    <!-- Optional JavaScript -->
    <script src="js/inicio.js"></script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
  </body>
</html>
<?php exit(); ?>