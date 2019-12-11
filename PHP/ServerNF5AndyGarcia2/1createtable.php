<?php
//connect to MySQL
$db = mysqli_connect('localhost', 'root') or die ('Unable to connect. Check your connection parameters.');
//create the main database if it doesn't already exist
$query = 'CREATE DATABASE IF NOT EXISTS bookweb';
mysqli_query($db,$query) or die(mysqli_error($db));
/*echo 'La base de datos bookweb ha sido creada correctamente';
echo '<br>';*/
//make sure our recently created database is the active one
mysqli_select_db($db,'bookweb') or die(mysqli_error($db));
//create the movie table
/*
$query1 = 'CREATE TABLE book (
        id_book       INTEGER(11) UNSIGNED  NOT NULL AUTO_INCREMENT, 
        isbn     VARCHAR(35)   DEFAULT "", 
        author     INTEGER(11) UNSIGNED  , 
        title     VARCHAR(255)   DEFAULT "", 
        visit     INTEGER(11) UNSIGNED  ,
        year_book     INTEGER(11) UNSIGNED  , 

        PRIMARY KEY (id_book)
    ) 
    ENGINE=MyISAM';
mysqli_query($db,$query1) or die (mysqli_error($db));
    $query2 = 'CREATE TABLE people (
        id_people      INTEGER(11) UNSIGNED  NOT NULL AUTO_INCREMENT, 
        name_people     VARCHAR(50) , 
        address_people     VARCHAR(255) , 
        age INTEGER(11),

        PRIMARY KEY (id_people)
    ) 
    ENGINE=MyISAM';
mysqli_query($db,$query2) or die (mysqli_error($db));*/
//$query= 'INSERT INTO book VALUES(5,"8724",5,"Harry Potter",5,2010)';
$query= 'INSERT INTO people VALUES(5,"Alejandro","Girona",20)';
/*$query= 'INSERT INTO categories VALUES(2,"Animals","Categoria animales")';
$query= 'INSERT INTO categories VALUES(3,"Objectes","Categoria objetos")';*/
mysqli_query($db,$query) or die (mysqli_error($db));
echo 'Los datos se han añadido correctamente';
?>