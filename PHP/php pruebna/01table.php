<?php
//connect to MySQL
$db = mysqli_connect('localhost', 'root') or 
    die ('Unable to connect. Check your connection parameters.');

//create the main database if it doesn't already exist
$query = 'CREATE DATABASE IF NOT EXISTS gente';
mysqli_query($db,$query) or die(mysqli_error($db));

echo 'La base de datos gente ha sido creada correctamente';
echo '<br>';

//make sure our recently created database is the active one
mysqli_select_db($db,'gente') or die(mysqli_error($db));

//create the movie table
$query = 'CREATE TABLE gente (
        id_gente        INTEGER UNSIGNED  NOT NULL AUTO_INCREMENT, 
        nombre_gente      VARCHAR(255) NOT NULL, 
        password_gente     VARCHAR(255) NOT NULL, 
        edad_gente      TINYINT UNSIGNED NOT NULL, 

        PRIMARY KEY (id_gente)
    ) 
    ENGINE=MyISAM';
mysqli_query($db,$query) or die (mysqli_error($db));

echo 'La Tabla gent ha sido creada correctamente';
?>