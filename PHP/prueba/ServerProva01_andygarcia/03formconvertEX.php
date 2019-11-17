<?php
    //connect to MySQL
    $db = mysqli_connect('localhost', 'root') or 
        die ('Unable to connect. Check your connection parameters.');
    //make sure our recently created database is the active one
    mysqli_select_db($db,'examen') or die(mysqli_error($db));
?>
<html>
    <head>
        <title>Por favor Inicie Sesión.</title>
    </head>
    <body>
        <form method="get" action="03GetconvertidorEX.php">
            <p>Introduce cantidad en euros:
                <input type="text" name="euros"/>
            </p>
            <p>
                <input type="submit" name="submit" value="Submit"/>
            </p>            
        </form>
    </body>
</html>