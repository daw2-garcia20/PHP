<?php
//connect to MySQL
$db = mysqli_connect('localhost', 'root') or die ('Unable to connect. Check your connection parameters.');
//create the main database if it doesn't already exist
$query = 'CREATE DATABASE IF NOT EXISTS pruebaExamen2';
mysqli_query($db,$query) or die(mysqli_error($db));
echo 'La base de datos pruebaExamen2 ha sido creada correctamente';
echo '<br>';
//make sure our recently created database is the active one
mysqli_select_db($db,'pruebaExamen2') or die(mysqli_error($db));
//create the movie table
$query = 'CREATE TABLE ciudad (
        id_ciudad        INTEGER UNSIGNED  NOT NULL AUTO_INCREMENT, 
        codigo_ciudad      VARCHAR(255) NOT NULL, 
        nombre_ciudad     VARCHAR(255) NOT NULL, 
        poblacion      INTEGER, 
        PRIMARY KEY (id_ciudad)
    ) 
    ENGINE=MyISAM';
mysqli_query($db,$query) or die (mysqli_error($db));
echo 'La Tabla ciudad ha sido creada correctamente';
$query = 'CREATE TABLE tiempo (
    id_tiempo        INTEGER UNSIGNED  NOT NULL AUTO_INCREMENT, 
    cf_ciudad      INTEGER, 
    temp_alta     INTEGER, 
    temp_baja      INTEGER, 
    precipitacion      INTEGER,
    fecha      DATE,
    color      INTEGER,
    PRIMARY KEY (id_tiempo),
    FOREIGN KEY (cf_ciudad) REFERENCES ciudad (id_ciudad)
) 
ENGINE=MyISAM';
mysqli_query($db,$query) or die (mysqli_error($db));
echo 'La Tabla tiempo ha sido creada correctamente';
?>