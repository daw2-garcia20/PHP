<?php
//Conectar MYSQL
$db = mysqli_connect('localhost', 'root') or 
    die ('Unable to connect. Check your connection parameters.');

//Conectar a la BD gente
mysqli_select_db($db,'examen') or die(mysqli_error($db));

$orden = $_GET['orden'];


$tabla.=<<<TABLE
<div style="text-align:center;margin:auto">
    <h3><em>Datos Gente</em></h3>
       <table border="1" style="margin:auto">
             <tr>
                 <th>ID</th>
                 <th>Nombre</th>
                 <th>Password</th>
                 <th>Edad</th>
             </tr>
TABLE;

// RECUPERAMOS DATOS
$query = "SELECT
        id_gente, nombre_gente, password_gente, edad_gente
    FROM
        gente 
        ORDER BY $orden DESC";

$result = mysqli_query($db, $query) or die(mysqli_error($db));
$row = mysqli_fetch_assoc($result);
extract($row);

$tabla.=<<<TABLE
<tr>
    <td>$id_gente</td>
    <td>$nombre_gente</td>
    <td>$password_gente</td>
    <td>$edad_gente</td>
</tr>
TABLE;

//Bucle para recorrer las filas e insertar los datos a cada campo de la tabla
while ($row = mysqli_fetch_assoc($result)) {
    extract($row);

    $tabla.=<<<TABLE
        <tr>
            <td>$id_gente</td>
            <td>$nombre_gente</td>
            <td>$password_gente</td>
            <td>$edad_gente</td>
        </tr>
TABLE;
}

$tabla.=<<<TABLE
        </table>
    </div>
TABLE;

echo $tabla;
?>