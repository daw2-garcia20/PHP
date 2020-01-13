<?php
$db = mysqli_connect('localhost', 'root') or die ('Unable to connect. Check your connection parameters.');
mysqli_select_db($db, 'comics') or die(mysqli_error($db));
//
$do = $_GET['do'];
$tipo = $_GET['type'];
$id = $_GET['id'];

if (!isset($do) || $do != 1) {
    if($tipo == 'comic'){
        echo 'Estás seguro que quieres borrar este comic?<br/>';
    }else{
        echo 'Estás seguro que quieres borrar esta persona?<br/>';
    } 
    echo '<a href="' . $_SERVER['REQUEST_URI'] . '&do=1">si</a> '; 
    echo 'or <a href="admin.php">no</a>';
}else{
    if($tipo == 'people') {
        $query = 'UPDATE comic SET
                autor1_comic = 0 
            WHERE
                autor1_comic = ' . $id;
        $result = mysqli_query($db, $query) or die(mysqli_error($db));
        $query = 'DELETE FROM people 
            WHERE
                people_id = ' . $id;
        $result = mysqli_query($db, $query) or die(mysqli_error($db));
?>
<p style="text-align: center;">Tu persona ha sido borrada.
<a href="admin.php">Volver a la administración</a></p>
<?php
    }else{
        $query = 'DELETE FROM comic 
            WHERE
                id_comic = ' . $id;
        $result = mysqli_query($db, $query) or die(mysqli_error($db));
?>
<p style="text-align: center;">Tu película ha sido borrada.
<a href="admin.php">Volver a la administración</a></p>
<?php
    }
}
?>