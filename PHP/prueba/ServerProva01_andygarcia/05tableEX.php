<?php
//connect to MySQL
$db = mysqli_connect('localhost', 'root') or 
    die ('Unable to connect. Check your connection parameters.');

//create the main database if it doesn't already exist
$query = 'CREATE DATABASE IF NOT EXISTS examen';
mysqli_query($db,$query) or die(mysqli_error($db));

echo 'La base de datos examen ha sido creada correctamente';
echo '<br>';

//make sure our recently created database is the active one
mysqli_select_db($db,'examen') or die(mysqli_error($db));

//create the movie table
$query = 'CREATE TABLE autor (
        id_autor        INTEGER UNSIGNED  NOT NULL AUTO_INCREMENT, 
        nombre_autor      VARCHAR(255) NOT NULL, 
        apellido_autor     VARCHAR(255) NOT NULL,
        nacionalidad_autor     VARCHAR(255) NOT NULL,  

        PRIMARY KEY (id_autor)
    ) 
    ENGINE=MyISAM';
mysqli_query($db,$query) or die (mysqli_error($db));

echo 'La Tabla autor ha sido creada correctamente';
?>