<html>
	<head>
		<title>Tabla</title>
	</head>
	<body>
		<?php
			$db = new mysqli('127.0.0.1','tonigonzalez1','tonigonzalez1','teamsite');
			if($db->connect_errno){
				echo "error";
            }
            
                mysqli_select_db($db,'teamsite') or die(mysqli_error($db));
                $nombre= $_POST['nombre'];
                $categoria= $_POST['categoria'];
                $fecha= $_POST['fecha'];
                $entrenador= $_POST['entrenador'];
                $capitan= $_POST['capitan'];
                $aficionado= $_POST['aficionado'];
                $coste= $_POST['coste'];
                $entrada= $_POST['entrada'];

                $query=<<<insert
                INSERT INTO team
                (team_name, team_category, team_year, team_captain, team_trainer, team_aficionados, team_cost, team_entradas)
                VALUES 
                ("$nombre", "$categoria", $fecha, "$capitan", "$entrenador", "$aficionado", "$coste", "$entrada");
insert;

mysqli_query($db, $query) or die(mysqli_error($db));
echo("Tu equipo se ha añadido!");
echo("<br/>")
     
?>
<a href="tabla.php"><input type="button" value="Volver a la tabla"></a>
        
    </body>
</html>