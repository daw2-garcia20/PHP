<?php
//connect to MySQL
$db = mysqli_connect('localhost', 'root') or die ('Unable to connect. Check your connection parameters.');
//create the main database if it doesn't already exist
$query = 'CREATE DATABASE IF NOT EXISTS adminpages';
mysqli_query($db,$query) or die(mysqli_error($db));
echo 'La base de datos adminpages ha sido creada correctamente';
echo '<br>';
//make sure our recently created database is the active one
mysqli_select_db($db,'adminpages') or die(mysqli_error($db));
//create the movie table
/*$query = 'CREATE TABLE photos (
        id_photos       INTEGER UNSIGNED  NOT NULL AUTO_INCREMENT, 
        filename_photos     VARCHAR(64) NOT NULL DEFAULT "", 
        comment     VARCHAR(255) DEFAULT NULL, 
        category_id      INTEGER UNSIGNED NOT NULL DEFAULT 0, 
        PRIMARY KEY (id_photos)
    ) 
    ENGINE=MyISAM';
    $query = 'CREATE TABLE categories (
        id_categories      INTEGER(11) UNSIGNED  NOT NULL AUTO_INCREMENT, 
        description_photos     VARCHAR(100) NOT NULL DEFAULT "", 
        preview     VARCHAR(64) NOT NULL DEFAULT "", 
        PRIMARY KEY (id_categories)
    ) 
    ENGINE=MyISAM';*/
/*$query= 'INSERT INTO categories VALUES(1,"Abstracte","Categoria abstracta")';*/
/*$query= 'INSERT INTO categories VALUES(2,"Animals","Categoria animales")';*/
/*$query= 'INSERT INTO categories VALUES(3,"Objectes","Categoria objetos")';*/
mysqli_query($db,$query) or die (mysqli_error($db));
echo 'La Tabla photos  y categorires han sido creadas correctamente';
?>