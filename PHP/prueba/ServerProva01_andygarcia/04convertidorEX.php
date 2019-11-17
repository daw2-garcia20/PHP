<?php
    session_start();
    //connect to MySQL
    $db = mysqli_connect('localhost', 'root') or 
        die ('Unable to connect. Check your connection parameters.');

    //make sure our recently created database is the active one
    mysqli_select_db($db,'examen') or die(mysqli_error($db));
   
$_SESSION['euros1'] = $_POST['euros'];
$_SESSION['libras2'] = $_POST['libras'];
$_SESSION['dolares3'] = $_POST['dolares'];
$_SESSION['yen4'] = $_POST['yen'];

        if($_SESSION==['euros']){
        $euros=10;
        $result = $euros * 166.368;
        echo "Tu/s ",$euros, "€ son ",$result,"pts";
        }else{
        echo "No es una moneda valida";    
        }

?>