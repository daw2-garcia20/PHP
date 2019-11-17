<?php
session_unset();
?>
<html>
    <head>
        <title>Por favor Inicie Sesión.</title>
    </head>
    <body>
        <form method="post" action="N1P101.php">
            <p>Introduce tu usuario:
                <input type="text" name="user"/>
            </p>
            <p>Introduce tu contraseña:
                <input type="password" name="pass"/>
            </p>
            <p>Introduce tu sexo:
                <input type="genero" name="gen"/>
            </p>
            <p>Introduce tu fecha de nacimiento:
                <input type="fecha" name="dat"/>
            </p>
            <p>
                <input type="submit" name="submit" value="Submit"/>
            </p>
            <?php
            $micomidapref = urlencode("Macarrones con Tomate");
            echo "<a href='N1P101.php?comidapref=$micomidapref'>";
            echo "Haz click aqui para averiguar mi comida favorita!";
            echo "</a>";
            setcookie("usuario","Marc",time()+60);
            ?>
            
        </form>
    </body>
</html>

