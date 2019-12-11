
<?php 
/*Lo primero que se hace es incluir un archivo de configuración en donde tenemos nuestras constantes, 
por ejemplo el nombre de dominio y DN. Luego, lo demás del código es para verificar si el usuario y 
la clave concuerdan con las del Active Directory.*/

require_once("Config.php"); 
 function mailboxpowerloginrd($user,$pass){ 
    $ldaprdn = trim($user).'@'.DOMINIO;  
    $ldappass = trim($pass);
    $ds = DOMINIO;
    $dn = DN;
    $sv = '192.168.164.156';
    $puertoldap = 389;  
    $ldapconn = ldap_connect($sv,$puertoldap);
    ldap_set_option($ldapconn, LDAP_OPT_PROTOCOL_VERSION,3);
    ldap_set_option($ldapconn, LDAP_OPT_REFERRALS,0);
    $ldapbind = @ldap_bind($ldapconn, $ldaprdn, $ldappass);
      if ($ldapbind){ 
        $filter="(|(SAMAccountName=".trim($user)."))"; 
        $fields = array("SAMAccountName","givenname","sn","count");
        $sr = @ldap_search($ldapconn, $dn, $filter, $fields);
        $info = @ldap_get_entries($ldapconn, $sr);
        $array = $info[0]["samaccountname"][0];
      }else{
        $array=0;
      }
    ldap_close($ldapconn);  
    return $array;
  }  
?>