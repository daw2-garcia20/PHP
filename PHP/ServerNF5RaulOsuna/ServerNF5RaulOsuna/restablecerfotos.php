<?php
$mysqli=mysqli_connect("127.0.0.1","raulosuna","raulosuna","rauldb") or die("No se puede conectar a la base de datos");
$tabla1="Create table photos 
(id int(11) unsigned not null auto_increment,
filename varchar(64) not null default '',
comment varchar(255) default null,
category_id int(11) unsigned not null default '0',
primary key (id))
";
$tabla2="create table categories (
id int(11) unsigned not null auto_increment,
description varchar(100) not null default '',
primary key (id)
)";
$insert1="insert into categories (description) values ('Abstacte'),('Animals'),('Objectes'),('Persones'),('Plantes'),('Fixe')";
$insert2="Insert into photos (filename,comment,category_id) values ('Untitled.png','Cosa con paint',1),('Untitled.png','Otra cosa con Paint',2),('Untitled.png','cosa ',3),('Untitled.png','examen',6)";

mysqli_query($mysqli,"drop table photos") or die (mysqli_error($mysqli));
mysqli_query($mysqli,$tabla1) or die (mysqli_error($mysqli));
mysqli_query($mysqli,$insert2) or die (mysqli_error($mysqli));

?>
<a href="photos.php">Volver</a>