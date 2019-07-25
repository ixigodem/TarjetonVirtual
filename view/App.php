<?php include("../controller/Seguridad.php");
/*Ésta es la página de bienvenida a nuestra aplicación. 
Muestra el nombre de usuario logueado y el link para cerrar la sesión. 
La primera línea hace una inclusión de un archivo seguridad.php 
el cuál es sumamente importante que se incluya en todas las páginas del sistema 
que se quiera proteger (que requiera autenticación).*/ 
?>

<html>
    <head>
        <title>Bienvenido al sistema</title>
    </head>
    <body>
        Hola! <?php echo $_SESSION["user"]; ?><br>
        <br>
        <a href="../controller/Salir.php">Salir del sistema</a>
    </body>
</html>