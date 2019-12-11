<html>
	<head>
		<title>Tabla</title>
	</head>
	<body>
		<?php
			$db = mysqli_connect('localhost', 'root') or die ('Unable to connect. Check your connection parameters.');
			            
            mysqli_select_db($db,'bookweb') or die(mysqli_error($db));
        
				
				if(!isset($_GET['do']) || $_GET['do'] != 1){
					switch ($_GET['type']){
						case 'libro':
						echo "Seguro que quieres eliminar este libro?<br/>";
                        break;
                        
						case 'persona':
						echo "Seguro que quieres eliminar esta persona?<br/>";
						break;
					}
                    echo '<a href="2eliminar.php?&do=1">Yes</a> ' ;
                    //'<td> <a href="2eliminarautorlibro.php?type=libro&team_id='.$id_book.'">'
                    //href="2eliminar.php&do='1'"
					echo 'or <a href="2table.php">No</a>';
				}else{
					switch($_GET['type']){
						case 'libro':
							$id_book = $_GET['id_book'];
							$query=<<<delete
								DELETE FROM book WHERE id_book = $id_book;

delete;
						mysqli_query($db,$query) or die(mysqli_error($db));
						echo("El libro se ha eliminado correctamente!");
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
				<a href="2table.php"><input type="button" value="Volver a la tabla"></a>
    </body>
</html>