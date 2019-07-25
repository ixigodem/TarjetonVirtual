<?php 
/*Básicamente se destruye la sesión y direccionamos a index.php. 
Si el usuario desea nuevamente entrar a app.php, no podrá dado que deberá de autenticarse.*/
 session_start(); 
 session_destroy(); 
 header("Location:../Index.php"); 
?>