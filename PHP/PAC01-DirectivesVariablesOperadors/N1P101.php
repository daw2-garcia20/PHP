<?php
session_start();
$_SESSION['usuario'] = $_POST['user'];
$_SESSION['password'] = $_POST['pass'];
$_SESSION['genero'] = $_POST['gen'];
$fecha= date($_POST['dat']);
$_SESSION['authuser'] = 0;

if(($_SESSION['usuario'] == 'Marc') and
    ($_SESSION['password'] == '1234')){
        $_SESSION['authuser'] == 1;
        echo 'Bienvenido ',$_COOKIE["usuario"];
} else {
    echo 'No estás registrado, regístrate para continuar!';
}
echo ' Mi comida favorita son los ',$_GET['comidapref'] ?? 'No tengo';
echo 'Mi fecha de nacimiento es el ',$fecha;
?>


