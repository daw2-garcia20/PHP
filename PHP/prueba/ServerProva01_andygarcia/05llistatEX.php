<?php
//Conectar MYSQL
$db = mysqli_connect('localhost', 'root') or 
    die ('Unable to connect. Check your connection parameters.');

//Conectar a la BD gente
mysqli_select_db($db,'examen') or die(mysqli_error($db));

$tabla.=<<<TABLE
<div style="text-align:center;margin:auto">
    <h3><em>Tabla Autor</em></h3>
       <table border="1" style="margin:auto">
             <tr>
                 <th>Nombre</th>
                 <th>Apellido</th>
                 <th>Nacionalidad</th>
             </tr>
TABLE;

// RECUPERAMOS DATOS
$query = 'SELECT
        nombre_autor, apellido_autor, nacionalidad_autor
    FROM
        autor';

$result = mysqli_query($db, $query) or die(mysqli_error($db));
$row = mysqli_fetch_assoc($result);
extract($row);

$tabla.=<<<TABLE
<tr>
    <td>$nombre_autor</td>
    <td>$apellido_autor</td>
    <td>$nacionalidad_autor</td>
</tr>
TABLE;

//Bucle para recorrer las filas e insertar los datos a cada campo de la tabla
while ($row = mysqli_fetch_assoc($result)) {
    extract($row);

    $tabla.=<<<TABLE
        <tr>
            <td>$nombre_autor</td>
            <td>$apellido_autor</td>
            <td>$nacionalidad_autor</td>
        </tr>
TABLE;
}

$tabla.=<<<TABLE
        </table>
    </div>
TABLE;

echo $tabla;
?>