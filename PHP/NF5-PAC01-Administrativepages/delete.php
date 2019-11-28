<?php
$db = mysqli_connect("127.0.0.1", "alejandro", "root", "game");
mysqli_select_db($db, 'game') or die(mysqli_error($db));

if (!isset($_GET['do']) || $_GET['do'] != 1) {
    switch ($_GET['type']) {
    case 'game':
        echo 'Seguro que quieres eliminar este juego?<br/>';
        break;
    case 'student':
        echo 'Seguro que quieres eliminar esta persona? <br/>';
        break;
    } 
    echo '<a href="' . $_SERVER['REQUEST_URI'] . '&do=1">yes</a> '; 
    echo 'or <a href="tabla.php">no</a>';
} else {
    switch ($_GET['type']) {
    case 'student':
        $query = 'UPDATE game SET
                game_leadactor = 0 
            WHERE
                game_leadactor = ' . $_GET['id'];
        $result = mysqli_query($db, $query) or die(mysqli_error($db));

        $query = 'DELETE FROM student 
            WHERE
                student_id = ' . $_GET['id'];
        $result = mysqli_query($db, $query) or die(mysqli_error($db));
?>
<p style="text-align: center;">Has eliminado un pobre estudiante.
<a href="tabla.php">Volver al Index</a></p>
<?php
        break;
    case 'game':
        $query = 'DELETE FROM game 
            WHERE
                game_id = ' . $_GET['id'];
        $result = mysqli_query($db, $query) or die(mysqli_error($db));
?>
<p style="text-align: center;">El juego ha sido elimnado correctamente.
<a href="tabla.php">Volver al Index</a></p>
<?php
        break;
    }
}
?>
