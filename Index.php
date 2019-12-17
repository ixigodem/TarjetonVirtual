<?php @session_start();?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    
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
        <li><a class="navbar-brand" href="http://localhost/TarjetonVirtualAPP/Index.php">
          <img src="img/Enfermeria.png" width="30" height="30" class="d-inline-block align-top" alt="">
          Tarjetón Virtual
          </a></li>
        <li class="nav-item"><a href="http://localhost/TarjetonVirtualAPP/Index.php" class="nav-link">Inicio</a></li>
        <li class="nav-item"><a href="http://web.saludcormun.cl/?page_id=3733" class="nav-link">Acerca de</a></li>
      </ul>

      <ul class="nav navbar-nav navbar-left ml-auto">			
        <li class="nav-item">
          <a data-toggle="dropdown" class="nav-link dropdown-toggle">Inicio de Sesión</a>
          <ul class="dropdown-menu form-wrapper">					
            <li>
              <form action="controller/Control.php" method="POST">
                <div class="form-group">
                  <input type="text" autocomplete="username" class="form-control" name="usuario" placeholder="Usuario:" maxlength="50" required="required">
                </div>
                <div class="form-group">
                  <input type="password" autocomplete="current-password" class="form-control" name="clave" placeholder="Clave:" required="required">
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
  <div class="bd-example">
  <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="3"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="4"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="5"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="6"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="7"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="img/fotos/portadas.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>Actividades Cardiovasculares</h5>
          <p>Actividades con la comunidad</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="img/fotos/portadas2.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>Actividades Cardiovasculares</h5>
          <p>Actividad realizada en la cancha de la Rancagua Sur</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="img/fotos/operativos1.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>Actividades Cardiovasculares</h5>
          <p>Actividad realizada en la sede de la pobación Isabel Riquelme</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="img/fotos/operativos2.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>Personal en ferias</h5>
          <p>Personal en la comunidad sensibilizando sobre las enfermedades cardiovasculares</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="img/fotos/operativos3.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>Personal en ferias</h5>
          <p>Personal en la comunidad sensibilizando sobre las enfermedades cardiovasculares</p>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
   </body>
</html>
<?php exit(); ?>