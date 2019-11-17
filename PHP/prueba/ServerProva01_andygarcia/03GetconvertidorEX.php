<?php
//Conectar MYSQL
$db = mysqli_connect('localhost', 'root') or 
    die ('Unable to connect. Check your connection parameters.');

//Conectar a la BD gente
mysqli_select_db($db,'gente') or die(mysqli_error($db));

$euros = $_GET['euros'];

$result = $euros * 166.368;
echo "Tu/s ",$euros, "€ son ",$result,"pts";
?>