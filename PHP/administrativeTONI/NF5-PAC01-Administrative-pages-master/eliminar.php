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
				
				if(!isset($_GET['do']) || $_GET['do'] != 1){
					switch ($_GET['type']){
						case 'equipo':
						echo "Seguro que quieres eliminar este equipo?<br/>";
						break;
						case 'persona':
						echo "Seguro que quieres eliminar esta persona?<br/>";
						break;
					}
					echo '<a href="'. $_SERVER['REQUEST_URI'] .'&do=1">Yes</a> ' ;
					echo 'or <a href="tabla.php">No</a>';
				}else{
					switch($_GET['type']){
						case 'equipo':
							$team_id = $_GET['team_id'];
							$query=<<<delete
								DELETE FROM team WHERE team_id = $team_id;

delete;
						mysqli_query($db,$query) or die(mysqli_error($db));
						echo("El equipo se ha eliminado correctamente!");
						echo("<br/>");
						break;

						case 'persona':
							$people_id = $_GET['people_id'];
							$query=<<<delete
							DELETE FROM people WHERE people_id = $people_id;

delete;
						mysqli_query($db,$query) or die(mysqli_error($db));
						echo("La persona se ha eliminado correctamente!");
						echo("<br/>");
						break;

				
				}
			}
				
   ?>
				<a href="tabla.php"><input type="button" value="Volver a la tabla"></a>
    </body>
</html>