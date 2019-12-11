<?php
$db = mysqli_connect('localhost', 'root') or 
die ('Unable to connect. Check your connection parameters.');
mysqli_select_db($db, 'clima') or die(mysqli_error($db));
/*
$query= 'CREATE TABLE Ciutat (
idCiutat INT PRIMARY KEY NOT NULL,
codi VARCHAR(45),
nom VARCHAR(45),
poblacio INT)';

$result = mysqli_query($db,$query) or die(mysqli_error($db));
echo $result;

$query= 'CREATE TABLE Temps (
idTemps INT PRIMARY KEY NOT NULL,
cfCiutat INT,
tempAlta INT,
tempBaixa INT,
precipitacio INT,
data DATE,
color INT,
FOREIGN KEY (cfCiutat) REFERENCES Ciutat(idCiutat))';

$result = mysqli_query($db,$query) or die(mysqli_error($db));
echo $result;
*/
/*$query= 'INSERT INTO Temps VALUES(3,3,10,0,90,"2019/02/11",3)';*/
$query= 'INSERT INTO Ciutat VALUES(3,"G-1","Girona",3)';
$result = mysqli_query($db,$query) or die(mysqli_error($db));
echo $result;
?>
