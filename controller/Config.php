<?php
/* Obviamente, el servidor web debería estar en la misma red 
donde esta el dominio para que pueda llegar a él mediante su registro DNS. OJO!, 
deberán de cambiar el nombre de dominio (midominio.com.sv) por el de ustedes. 
Si en control.php se determina que el usuario y contraseña ingresado corresponde 
al usuario y contraseña que se encuentra en el Active Directory, 
redirecciona hacia un archivo app.php el cual es nuestra primera página de nuestra aplicación.*/

    define('DOMINIO', 'dominiotest.cl');
    define('DN', 'dc=dominiotest,dc=cl');
?>