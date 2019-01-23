<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Tarjetón Virtual</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
    <table id="data_table" class="table table-striped">
        <thead>
        <tr>
            <th>RUN</th>
            <th>NOMBRES</th>
            <th>APELLIDO PATERNO</th>
            <th>APELLIDO MATERNO</th>
            <th>FECHA NACIMIENTO</th>
            <th>SEXO</th>
            <th>PARTICIPACIÓN SOCIAL</th>
            <th>ESTUDIO</th>
            <th>ACTIVIDAD LABORAL</th>
            <th>DIRECCIÓN PARTICULAR</th>
            <th>ESTADO CIVIL</th>
            <th>COMUNA</th>
            <th>ESTADO</th>
        </tr>
        </thead>
    <tbody>
<?php
require_once("../model/Data.php");
$d = new Data();


?>
<tr RUN="<?php echo $developer ['id']; ?>">
<td><?php echo $developer ['id']; ?></td>
<td><?php echo $developer ['name']; ?></td>
<td><?php echo $developer ['gender']; ?></td>
<td><?php echo $developer ['age']; ?></td>
<td><?php echo $developer ['designation']; ?></td>
<td><?php echo $developer ['address']; ?></td>
</tr>
<?php } ?>
</tbody>
</table>

    <!-- Librerias Jquery para la creación de tablas -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script type="text/javascript" src="dist/jquery.tabledit.js"></script>
    <script type="text/javascript" src="custom_table_edit.js"></script>
</body>
</html>