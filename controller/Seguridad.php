<?php
/*Aquí validamos si realmente el usuario que quiere acceder a ésta página esta autenticado. 
Si no lo esta, lo direccionamos a la página index.php. 
Si esta autenticado, verá la página de bienvenida y su nombre de usuario.*/
@session_start();
if($_SESSION["autentica"] != "SIP"){
    header("Location: ../Index.php");
    exit();
}
?>