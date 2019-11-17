<?php
session_unset();
?>
<html>
    <head>
        <title>Por favor Inicie Sesión.</title>
    </head>
    <body>
        <?php
        date_default_timezone_set("Europe/Madrid");
        echo "Ayer fue ";
        echo date("l", strtotime("-1 days"));
        echo "<br>";
        echo "El mes que viene es ";
        echo date("F", strtotime("+1 month"));
        echo "<br>";
        echo "Hay ";
        $mes = date("n");
        $ano = date("o");
        $diasMes = cal_days_in_month(CAL_GREGORIAN, $mes, $ano);
        echo $diasMes;
        echo " días en este mes.";
        echo "<br>";
        $mesFinal = (12);
        $resultado = $mesFinal - $mes;
        echo "Faltan ";
        echo $resultado;
        echo " meses para acabar este año.";
        echo "<br>";
        ?>
        <form method="post" action="N1P101.php">
            <p>Introduce tu usuario:
                <input type="text" name="user"/>
            </p>
            <p>Introduce tu contraseña:
                <input type="password" name="pass"/>
            </p>
            <p>
                <textarea name="comentarios" rows="10" cols="40">Escribe aquí tus comentarios</textarea>
            </p>
                <input type="color" name="color"/>
            <p>Introduce el tipo de fuente:
                <input type="text" name="fuente"/>
            </p>
            <p>Introduce el tamaño:
                <input type="text" name="tamano"/>
            </p>
            <p>Quieres guardar los datos?
                <input type="checkbox" name="guardar" value="si"/>
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
        <?php
        echo "Site developed by: ";
        echo "<a href='http://www.google.es' target=_blank>";
        echo "Marc Navarro";
        echo "</a>";
        ?>
    </body>
</html>

