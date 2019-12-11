<?php
$db = mysqli_connect('localhost', 'root') or die ('Unable to connect. Check your connection parameters.');
mysqli_select_db($db, 'pruebaexamen2') or die(mysqli_error($db));
//
$accion = $_GET['action'];
$id = $_GET['id'];
if ($accion == 'edit') {
    //retrieve the record's information 
    $query = 'SELECT
            codigo_ciudad, nombre_ciudad, poblacion
        FROM
            ciudad
        WHERE
            id_ciudad = ' . $id;
    $result = mysqli_query($db, $query) or die(mysqli_error($db));
    extract(mysqli_fetch_assoc($result));
} else {
    //set values to blank
    $codigo_ciudad = '';
    $nombre_ciudad = '';    
    $poblacion = 0;
}
?>
<html>
 <head>
  <title><?php echo ucfirst($accion); ?> Ciudad</title>
 </head>
 <body>
  <form action="commit.php?action=<?php echo $accion; ?>&type=ciudad" method="post">
   <table>
    <tr>
     <td>Código Ciudad</td>
     <td><input type="text" name="codigo_ciudad" value="<?php echo $codigo_ciudad; ?>"/></td>
    </tr><tr>
     <td>Nombre Ciudad</td>
     <td><input type="text" name="nombre_ciudad" value="<?php echo $nombre_ciudad; ?>"/></td>
    </tr><tr>
     <td>Población</td>
     <td><input type="number" name="poblacion" value="<?php echo $poblacion; ?>"/></td>
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