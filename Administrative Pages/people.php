<?php
$db = mysqli_connect('localhost', 'root') or die ('Unable to connect. Check your connection parameters.');
mysqli_select_db($db, 'comics') or die(mysqli_error($db));
//
$accion = $_GET['action'];
$id = $_GET['id'];

if ($accion == 'edit') {
    //retrieve the record's information 
    $query = 'SELECT
            people_fullname, people_isautor, people_isdirector
        FROM
            people
        WHERE
            people_id = ' . $id;
    $result = mysqli_query($db, $query) or die(mysqli_error($db));
    extract(mysqli_fetch_assoc($result));
} else {
    //set values to blank
    $people_fullname = '';
    $people_isautor = 0;
    $people_isdirector = 0;
}
?>
<html>
 <head>
  <title><?php echo ucfirst($accion); ?> People</title>
 </head>
 <body>
  <form action="commit.php?action=<?php echo $accion; ?>&type=people" method="post">
   <table>
    <tr>
     <td>Nombre</td>
     <td><input type="text" name="people_fullname" value="<?php echo $people_fullname; ?>"/></td>
    </tr><tr>
    <?php
        if($people_isautor == 1){
            echo '<td><input type="radio" name="cargo" value="autor" checked>Autor</input></td>';
            echo '<td><input type="radio" name="cargo" value="director">Director</input></td>';
        }else{
            echo '<td><input type="radio" name="cargo" value="autor">Autor</input></td>';
            echo '<td><input type="radio" name="cargo" value="director" checked>Director</input></td>';
        }
    ?>
    </tr>
    <tr>
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