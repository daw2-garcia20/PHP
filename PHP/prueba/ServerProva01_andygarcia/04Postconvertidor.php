<?php
//Conectar MYSQL
$db = mysqli_connect('localhost', 'root') or 
    die ('Unable to connect. Check your connection parameters.');

//Conectar a la BD gente
mysqli_select_db($db,'examen') or die(mysqli_error($db));

$_SESSION['euros1'] = $_POST['euros'];
$_SESSION['libras2'] = $_POST['libras'];
$_SESSION['dolares3'] = $_POST['dolares'];
$_SESSION['yen4'] = $_POST['yen'];
if($_SESSION[]='euros1'){
?>
    <a href="04convertidorEX.php" target="_blank">Enlace al resultado</a>
<?php
    }else{
    echo"hola";    
    }
?>
