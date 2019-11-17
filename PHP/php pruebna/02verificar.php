<?php
    //connect to MySQL
    $db = mysqli_connect('localhost', 'root') or 
        die ('Unable to connect. Check your connection parameters.');

    //make sure our recently created database is the active one
    mysqli_select_db($db,'gente') or die(mysqli_error($db));

$usuario = $_POST['user'];
$contrasena = $_POST['pass'];
$edad = $_POST['age']; 

    if($edad<18){
        echo 'No se puede acceder.';
    }else{
        $query = "INSERT INTO gente(nombre_gente,password_gente,edad_gente) VALUES ('$usuario','$contrasena','$edad')";
        mysqli_query($db,$query) or die(mysqli_error($db));
        setcookie("usuario","$usuario");
    }

?>