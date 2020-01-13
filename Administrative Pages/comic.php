<?php
$db = mysqli_connect('localhost', 'root') or die ('Unable to connect. Check your connection parameters.');
mysqli_select_db($db, 'comics') or die(mysqli_error($db));
//
$accion = $_GET['action'];
$id = $_GET['id'];

if ($accion == 'edit') {
    //retrieve the record's information 
    $query = 'SELECT
            nombre_comic, tipo_comic, ano_comic, autor1_comic, autor2_comic, paginas_comic, ventas_comic, coste_comic
        FROM
            comic
        WHERE
            id_comic = ' . $id;
    $result = mysqli_query($db, $query) or die(mysqli_error($db));
    extract(mysqli_fetch_assoc($result));
} else {
    //set values to blank
    $nombre_comic = '';
    $tipo_comic = 0;
    $ano_comic = date('Y');
    $autor1_comic = 0;
    $autor2_comic = 0;
    $paginas_comic = 0;
    $ventas_comic = 0;
    $coste_comic = 0;
}
?>
<html>
 <head>
  <title><?php echo ucfirst($accion); ?> comic</title>
 </head>
 <body>
  <form action="commit.php?action=<?php echo $accion; ?>&type=comic" method="post">
   <table>
    <tr>
     <td>Nombre comic</td>
     <td><input type="text" name="nombre_comic" value="<?php echo $nombre_comic; ?>"/></td>
    </tr><tr>
     <td>Tipo comic</td>
     <td><select name="tipo_comic">
<?php
// select the movie type information
$query = 'SELECT
        tipocomic_id, tipocomic_label
    FROM
        tipocomic
    ORDER BY
        tipocomic_label';
$result = mysqli_query($db, $query) or die(mysqli_error($db));
extract($row);
// populate the select options with the results
while ($row = mysqli_fetch_assoc($result)) {
    if ($row['tipocomic_id'] == $tipo_comic) {
        echo '<option value="' . $row['tipocomic_id'] .'" selected="selected">';
    } else {
        echo '<option value="' . $row['tipocomic_id'] . '">';
    }
    echo $row['tipocomic_label'] . '</option>';
    
}
?>
      </select></td>
    </tr><tr>
     <td>Año comic</td>
     <td><select name="ano_comic">
<?php
// populate the select options with years
for ($yr = date("Y"); $yr >= 1970; $yr--) {
    if ($yr == $ano_comic) {
        echo '<option value="' . $yr . '" selected="selected">' . $yr .'</option>';
    } else {
        echo '<option value="' . $yr . '">' . $yr . '</option>';
    }
}
?>
      </select></td>
    </tr><tr>
     <td>Autor 1 comic</td>
     <td><select name="autor1_comic">
<?php
// select actor records
$query = 'SELECT
        people_id, people_fullname
    FROM
        people
    ORDER BY
        people_fullname';
$result = mysqli_query($db, $query) or die(mysqli_error($db));
extract($row);
// populate the select options with the results
while ($row = mysqli_fetch_assoc($result)) {
    if ($row['people_id'] == $autor1_comic) {
        echo '<option value="' . $row['people_id'] .'" selected="selected">';
    } else {
        echo '<option value="' . $row['people_id'] . '">';
    }
    echo $row['people_fullname'] . '</option>';
}
?>
      </select></td>
    </tr><tr>
     <td>Autor 2 comic</td>
     <td><select name="autor2_comic">
<?php
// select director records
$query = 'SELECT
        people_id, people_fullname
    FROM
        people
    ORDER BY
        people_fullname';
$result = mysqli_query($db, $query) or die(mysqli_error($db));
extract($row);
// populate the select options with the results
while ($row = mysqli_fetch_assoc($result)) {
    if ($row['people_id'] == $autor2_comic) {
        echo '<option value="' . $row['people_id'] .'" selected="selected">';
    } else {
        echo '<option value="' . $row['people_id'] . '">';
    }
    echo $row['people_fullname'] . '</option>';
}

?>
      </select></td>
    </tr><tr>
     <td>Páginas comic</td>
     <td><input type="number" name="paginas_comic" value="<?php echo $paginas_comic; ?>"/></td>
    </tr><tr>
     <td>Coste comic</td>
     <td><input type="number" name="coste_comic" value="<?php echo $coste_comic; ?>"/></td>
    </tr><tr>
     <td>Ventas comic</td>
     <td><input type="number" name="ventas_comic" value="<?php echo $ventas_comic; ?>"/></td>
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