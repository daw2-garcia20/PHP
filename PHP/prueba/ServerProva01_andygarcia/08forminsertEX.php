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
        <form method="post" action="02verificarinsertEX.php">
            <p>Introduce nombre autor:
                <input type="text" name="user"/>
            </p>
            <p>Introduce apellido autor:
                <input type="text" name="pass"/>
            </p>
            <p>Introduce nacionalidad autor:
                <input type="text" name="age"/>
            </p>
            <p>
                <input type="submit" name="submit" value="Submit"/>
            </p>            
        </form>
    </body>
</html>