<?php
$db = mysqli_connect('localhost', 'root') or 
die ('Unable to connect. Check your connection parameters.');
mysqli_select_db($db, 'clima') or die(mysqli_error($db));

$colorcillo= $_GET['color'];
if ($colorcillo!=3){
    

if (!isset($_GET['do']) || $_GET['do'] != 1) {
    switch ($_GET['type']) {
    case 'ciutat':
        echo 'Seguro que quieres eliminar esta ciudad?<br/>';
        break;
    case 'temps':
        echo 'Seguro que quieres eliminar este tiempo? <br/>';
        break;
    } 
    echo '<a href="' . $_SERVER['REQUEST_URI'] . '&do=1">yes</a> '; 
    echo 'or <a href="adminp2.php">no</a>';
} else {
    switch ($_GET['type']) {
    case 'temps':
        $query = 'DELETE FROM temps 
            WHERE
                idTemps = ' . $_GET['id'];
        $result = mysqli_query($db, $query) or die(mysqli_error($db));
?>
<p style="text-align: center;">El tiempo ha sido eliminado correctamente.
<a href="adminp2.php">Volver al Index</a></p>
<?php
        break;
    case 'ciutat':
        $query = 'DELETE FROM ciutat 
            WHERE
                idCiutat= ' . $_GET['id'];
        $result = mysqli_query($db, $query) or die(mysqli_error($db));
?>
<p style="text-align: center;">La ciudad ha sido eliminada correctamente.
<a href="adminp2.php">Volver al Index</a></p>
<?php
        break;
    }
}
}
else {
    echo "No puedes eliminar esto titan vete al index anda cabesa";
    echo '<a href="adminp2.php">Volver al Index</a></p>';
}
?>
