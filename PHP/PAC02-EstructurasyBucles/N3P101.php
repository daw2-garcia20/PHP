<?php
session_start();
$_SESSION['usuario'] = $_POST['user'];
$_SESSION['password'] = $_POST['pass'];
$_SESSION['genero'] = $_POST['gen'];
$_SESSION['comentarios'] = $_POST['comentarios'];
$_SESSION['color'] = $_POST['color'];
$_SESSION['fuente'] = $_POST['fuente'];
$_SESSION['tamano'] = $_POST['tamano'];
$_SESSION['guardar'] = $_POST['guardar'];
$color = $_POST['color'];
$fuente = $_POST['fuente'];
$tamano = $_POST['tamano'];
$fecha= date($_POST['dat']);
$comentarios = $_POST['comentarios'];
$guardar = $_POST['guardar'];
$cont;
$_SESSION['authuser'] = 0;

if(($_SESSION['usuario'] == 'Marc') and
    ($_SESSION['password'] == '1234')){
        $_SESSION['authuser'] == 1;
        echo 'Bienvenido ',$_COOKIE["usuario"];
        echo "<br>";     
} else {
    echo 'No estás registrado, regístrate para continuar!';
    echo "<br>";
}


$archivo = "contador.txt"; 

if(file_exists($archivo)){
$contador = file_get_contents($archivo);
$yaHasEstadoAqui = $_COOKIE[‘yaHasEstadoAqui’]; 
if (!$yaHasEstadoAqui)$contador ++; 

}else{
touch($archivo);
chmod($archivo, 0755);
$contador = 1; 
}


setcookie("yaHasEstadoAqui",1, time() + 1);


file_put_contents($archivo, $contador); 

echo "<br>";

$mes = date("n");
if($mes >= 3 && $mes < 6){
    echo "Buena Primavera!";
}
if($mes >= 6 && $mes < 9){
    echo "Buen Verano!";
}
if($mes >= 9 && $mes < 12){
    echo "Buen Otoño!";
}
if($mes >= 12 && $mes < 3){
    echo "Buen Invierno!";
}

echo "<br>";

echo "<p style='color:$color; font-family:$fuente; font-size:$tamano;'>$comentarios</p>";

echo "<br>";

setcookie("comentarios","$comentarios",time()+60);
setcookie("fuente","$fuente",time()+60);
setcookie("color","$color",time()+60);
setcookie("tamano","$tamano",time()+60);

if($guardar=='si'){
    echo "Comentarios:", $_COOKIE['comentarios'];
    echo "<br>";
    echo "Tipo de fuente:", $_COOKIE['fuente'];
    echo "<br>";
    echo "Color:", $_COOKIE['color'];
    echo "<br>";
    echo "Tamaño de fuente:", $_COOKIE['tamano'];
    echo "<br>";
}

echo "Eres el visitante numero",$contador;

echo "Site developed by: ";
echo "<a href='http://www.google.es' target=_blank>";
echo "Marc Navarro";
echo "</a>";


?>


