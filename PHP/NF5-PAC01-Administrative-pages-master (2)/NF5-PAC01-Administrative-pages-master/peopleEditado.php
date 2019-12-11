<html>
	<head>
		<title>Tabla</title>
	</head>
	<body>
		<?php
			$db = mysqli_connect('localhost', 'root') or die ('Unable to connect. Check your connection parameters.');
			            
            mysqli_select_db($db,'adminpages') or die(mysqli_error($db));
                $nombre= $_POST['nombre'];
                $people_id = $_POST['id'];
                $query=<<<update
                UPDATE people SET
                people_fullname = "$nombre"
                WHERE
                people_id = $people_id
update;
                mysqli_query($db,$query) or die(mysqli_error($db));
                echo("Tu datos han sido actualizados.");
                echo("<br/>");
        ?>

    <a href="tabla.php"><input type="button" value="Volver a la tabla"></a>
    </body>
</html>