<?php 
/*Como se puede ver en el código, incluímos un archivo llamado ldap.php, 
que es el que hace la conexión hacia Active Directory. 
Luego capturamos el nombre de usuario y la clave (que vienen del Index.php por POST) 
y hacemos referencia a una función que esta en ldap.php para poder verificar que el usuario y 
contraseña enviados concuerda con la información en el AD. Luego, se verifica si retorna la 
función un 0 (no se logró autenticar) o un 1 (si se logró autenticar), para así guardar las 
variables de sesión respectivas o no. 
Al final, se redirecciona a la página respectiva dependiendo del resultado de la autenticación*/
    require("Ldap.php");

    header("Content-Type: text/html; charset=utf-8"); 
    $usr = $_POST["usuario"];
    $usuario = mailboxpowerloginrd($usr,$_POST["clave"]);
    $nombre = str_replace("CN=","",$usuario[0]);
    $estamento = str_replace("OU=","",$usuario[1]);
    if($usuario == "0" || $usuario == ''){ 
        $_SERVER = array();
        $_SESSION = array();
        // echo"<script> alert('Usuario o clave incorrecta. Vuelva a digitarlos por favor.');
        // window.location.href='../Index.php';</script>";
    }else{ 
        session_start();
        $_SESSION["nombre"] = $nombre;
        $_SESSION["estamento"] = $estamento;
        $_SESSION["autentica"] = "SIP";
        echo"<script> alert('¡El usuario se ingreso correctamente!');</script>";
        echo"<script>window.location.href='../view/Menu.php'; </script>";
    }
    echo $_SESSION["estamento"];
?>