<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Prueba de añadir option a un select</title>
<link type="text/css" href="css/styles.css" rel="stylesheet">
<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.8.6.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
  $("#hide").click(function(){
    $("#element").hide();
  });
  $("#show").click(function(){
    $("#element").show();
  });
});
</script>
<script type="text/javascript">
 
$(document).ready(function() {
 
    $("#enviar-btn").click(function() {
 
        var nameop = $("input#name").val();
        var valoropcion=$("input#opvalor").val();
 
        /*var dataString = 'nameop=' + nameop + '&opvalor=' + valoropcion;

        $.ajax({
            type: "POST",
            url: "addcomment.php",
            data: dataString,
            success: function() {
				$("#element").hide();
                $('#newmessage').append('<h2>Tu información ha sido grabada correctamente!</h2><table><tr><td>Nombre opci&oacute;n:</td><td>'+name+'</td></tr><tr><td>Valor de la opci&oacute;n: </td><td>'+valorop+'</td></tr></table>');
            }
        });*/
 
        $('#campo_select_append').append('<option value="'+valoropcion+'" selected="selected">'+nameop+'</option>');
 
        return false;
    });
 
    $("#enviar").click(function() {
      var mitexto = $("#campo_select_append option:selected").text();
      var mivalor = $("#campo_select_append").val();
      alert("Has seleccionat "+mitexto+" amb valor id="+mivalor);
    })
});
</script>
 
</head>
 
<body>
<div class="header"><h2>Cabecera de simulación para ver el efecto jquery-ajax</h2></div>
 
<div class="capa1">
<br /><br />
Tenemos un select en un formulario:
<br /><br />
<form method="post" action="">
<select name="campo_select_append" id="campo_select_append">
<option value="opcion_1">Opción 1</option>
<option value="opcion_2">Opción 2</option>
<option value="opcion_3">Opción 3</option>
<option value="opcion_4">Opción 4</option>
<option value="opcion_5">Opción 5</option>
<option value="opcion_6">Opción 6</option>
<option value="opcion_7">Opción 7</option>
<option value="opcion_8">Opción 8</option>
<option value="opcion_9">Opción 9</option>
<option value="opcion_10">Opción 10</option>
</select>&nbsp;&nbsp;<a href="#" id="show"><input type="button" value="Añadir opción"></a>
<br />
<input id="enviar" name="Enviar" type="submit" value="enviar" />
<br />
</form>
</div>
 
<div id="newmessage"></div>
<!--<a href="#" id="show">Mostrar</a>-->
<div id="element" style="display: none;">
   <div id="close"><a href="#" id="hide"><input type="button" value="Cerrar formulario"></a></div>
   <br /><br />
   <form method="post" action="" name="nuevoitem" id="nuevoitem">
        Nombre de la nueva opción:&nbsp;&nbsp;
        <input type="text" id="name" name="name" size="40" />&nbsp;&nbsp;&nbsp;&nbsp;
 
        Valor:&nbsp;&nbsp;
        <input type="text" id="opvalor" name="opvalor" size="20" />
        <br/><br/>
        <div style="margin-left: 376px;"><input name="submit" type="submit" value="enviar" id="enviar-btn" /></div>
    </form>
</div>
</body>
</html>