<?php
    //connect to MySQL
    $db = mysqli_connect('localhost', 'root') or 
        die ('Unable to connect. Check your connection parameters.');

    //make sure our recently created database is the active one
    mysqli_select_db($db,'examen') or die(mysqli_error($db));

$usuario = $_POST['user'];
$contrasena = $_POST['pass'];
$edad = $_POST['age']; 

   
        $query = "INSERT INTO autor(nombre_autor,apellido_autor,nacionalidad_autor) VALUES ('$usuario','$contrasena','$edad')";
        mysqli_query($db,$query) or die(mysqli_error($db));
        setcookie("usuario","$usuario");
        echo 'Usuario creado';

?>