<html>
	<head>
		<title>Tabla</title>
	</head>
	<body>
		<?php
			$db = mysqli_connect('localhost', 'root') or die ('Unable to connect. Check your connection parameters.');
			            
            mysqli_select_db($db,'adminpages') or die(mysqli_error($db));
                $nombre= $_POST['nombre'];
                $categoria= $_POST['categoria'];
                $fecha= $_POST['fecha'];
                $entrenador= $_POST['entrenador'];
                $capitan= $_POST['capitan'];
                $aficionado= $_POST['aficionado'];
                $coste= $_POST['coste'];
                $entrada= $_POST['entrada'];
                $team_id = $_POST['id'];
                $query=<<<update
                UPDATE team SET
                team_name = "$nombre",
                team_category = "$categoria",
                team_year = $fecha,
                team_captain = "$capitan",
                team_trainer = "$entrenador",
                team_aficionados = $aficionado,
                team_cost = $coste,
                team_entradas = $entrada
                WHERE
                team_id = $team_id
update;

                mysqli_query($db,$query) or die(mysqli_error($db));
                echo("Tu datos han sido actualizados.");
                echo("<br/>");
        ?>

    <a href="tabla.php"><input type="button" value="Volver a la tabla"></a>
    </body>
</html>