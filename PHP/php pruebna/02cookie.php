<?php
    //connect to MySQL
    $db = mysqli_connect('localhost', 'root') or 
        die ('Unable to connect. Check your connection parameters.');

    //make sure our recently created database is the active one
    mysqli_select_db($db,'gente') or die(mysqli_error($db));

    echo $_COOKIE['usuario'], " ens convertim amb el que pensem";


?>