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
						echo "Seguro que quieres eliminar este libro y su autor?<br/>";
                        break;
                        
						case 'persona':
						echo "Seguro que quieres eliminar esta persona?<br/>";
						break;
					}
					echo '<a href="'. $_SERVER['PHP_SELF'] .'&do='1'">Yes</a> ' ;
					echo 'or <a href="2table.php">No</a>';
				}else{
					switch($_GET['type']){
						case 'libro':
                            $id_book = $_GET['id_book'];
                            $autorborrar=$_GET['author'];
							$query=<<<delete
								DELETE FROM book WHERE id_book = $id_book;

delete;
                            mysqli_query($db,$query) or die(mysqli_error($db));
                            $query2=<<<delete
								DELETE FROM people WHERE id_people = $autorborrar;

delete;
						    mysqli_query($db,$query2) or die(mysqli_error($db));
						echo("El libro y su autor se han eliminado correctamente!");
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