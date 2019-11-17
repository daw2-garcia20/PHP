<?php
    session_start();
    //connect to MySQL
    $db = mysqli_connect('localhost', 'root') or 
        die ('Unable to connect. Check your connection parameters.');

    //make sure our recently created database is the active one
    mysqli_select_db($db,'gente') or die(mysqli_error($db));

    $_SESSION['numeroA'] = $_POST['numA'];
    $_SESSION['numeroB'] = $_POST['numB'];
?>
<a href="03missatge.php" target="_blank">Enlace al mensaje</a>