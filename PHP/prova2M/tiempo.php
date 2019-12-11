<?php
$db = mysqli_connect('localhost', 'root') or die ('Unable to connect. Check your connection parameters.');
mysqli_select_db($db, 'pruebaexamen2') or die(mysqli_error($db));
//
$accion = $_GET['action'];
$id = $_GET['id'];
if ($accion == 'edit') {
    //retrieve the record's information 
    $query = 'SELECT id_tiempo, cf_ciudad, temp_alta, temp_baja, precipitacion, fecha, color, nombre_ciudad
            FROM ciudad,tiempo
            WHERE id_tiempo = ' . $id;
    $result = mysqli_query($db, $query) or die(mysqli_error($db));
    extract(mysqli_fetch_assoc($result));
} else {
    //set values to blank
    $id_ciudad = 0;
    $nombre_ciudad = '';
    $temp_alta = 0;
    $temp_baja = 0;
    $precipitacion = 0;
    $fecha = 0;
    $color = 0;
}
?>
<html>
 <head>
  <title><?php echo ucfirst($accion); ?> Tiempo</title>
 </head>
 <body>
  <form action="commit.php?action=<?php echo $accion; ?>&type=tiempo" method="post">
   <table>
    <tr>
     <td>Nombre Ciudad</td>
     <td><select name="nombre_ciudad">
<?php
// select the movie type information
$query = 'SELECT
        id_ciudad, nombre_ciudad
    FROM
        ciudad
    ORDER BY
        nombre_ciudad';
$result = mysqli_query($db, $query) or die(mysqli_error($db));
extract($row);
// populate the select options with the results
while ($row = mysqli_fetch_assoc($result)) {
    if ($row['id_ciudad'] == $cf_ciudad) {
        echo '<option value="' . $row['id_ciudad'] .'" selected="selected">';
    } else {
        echo '<option value="' . $row['id_ciudad'] . '">';
    }
    echo $row['nombre_ciudad'] . '</option>';
    
}
if($color<3){
    $color= $color+1;
}
?>
      </select></td>
    </tr><tr>
     <td>Temperatura Máxima</td>
     <td><input type="number" name="temp_alta" value="<?php echo $temp_alta; ?>"/></td>
    </tr><tr>
     <td>Temperatura Mínima</td>
     <td><input type="number" name="temp_baja" value="<?php echo $temp_baja; ?>"/></td>
    </tr><tr>
     <td>Precipitacion</td>
     <td><input type="number" name="precipitacion" value="<?php echo $precipitacion; ?>"/></td>
    </tr><tr>
     <td>Fecha</td>
     <td><input type="date" name="fecha" value="<?php echo $fecha; ?>"/></td>
    </tr><tr>
     <td colspan="2" style="text-align: center;">
        <input type="hidden" value="<?php echo $color ?>" name="color" />
    </td>
    </tr><tr>
     <td colspan="2" style="text-align: center;">
<?php
if ($accion == 'edit') {
    echo '<input type="hidden" value="' . $id . '" name="id" />';
}
?>
    <input type="submit" name="submit"
       value="<?php echo ucfirst($accion); ?>" />
        </td>
    </tr>
   </table>
  </form>
 </body>
</html>