<?php
    //connect to MySQL
    $db = mysqli_connect('localhost', 'root') or 
        die ('Unable to connect. Check your connection parameters.');

    //make sure our recently created database is the active one
    mysqli_select_db($db,'gente') or die(mysqli_error($db));
?>
<html>
    <head>
        <title>Por favor Inicie Sesión.</title>
    </head>
    <body>
        <form method="post" action="03guardar.php">
            <p>Introduce numA:
                <input type="number" min="1" max="10" name="numA"/>
            </p>
            <p>Introduce numB:
                <input type="number" min="1" max="10" name="numB"/>
            </p>
            <p>
                <input type="submit" name="submit" value="Submit"/>
            </p>            
        </form>
    </body>
</html>
