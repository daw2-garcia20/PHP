<?php
session_start();
$visitas = $_SESSION['visitas'];
if(!isset($_SESSION['visitas'])){
    $_SESSION['visitas']=1;
}else{
    $_SESSION['visitas']++;
}
echo "La página lleva ";
echo $visitas;
echo " visitas.";
?>