<html>
	<head>
		<title>Tabla</title>
	</head>
	<body>
		<?php
			$db = mysqli_connect('localhost', 'root') or die ('Unable to connect. Check your connection parameters.');
			            
                mysqli_select_db($db,'photoweb') or die(mysqli_error($db));
                $query =  
'select id_categories, description_photos, preview  
    FROM
        categories
    WHERE
        id_categories>0';
$result = mysqli_query($db,$query) or die(mysqli_error($db));

// determine number of rows in returned result
$num_team = mysqli_num_rows($result);

function get_id($team_id) {

    global $db;

    $query = 'SELECT 
            id_categories 
       FROM
            categories
       WHERE
           id_categories = ' . $id_categories;
    $result = mysqli_query($db, $query) or die(mysqli_error($db));

    $row = mysqli_fetch_assoc($result);
    extract($row);

    return $team_id;
}
?>
<div style="text-align: center;">
 <h2>Categorias pagina web</h2>
 <a href='catego.php?action=add'>Añadir</a>
 <table border="1" cellpadding="2" cellspacing="2"
  style="width: 70%; margin-left: auto; margin-right: auto;">
   <th>Categories Id</th>
   <th>Description</th>
   <th>Preview</th>
    <th>Eliminar</th>
<?php
// loop through the results
$editar = "Editar";
$eliminar = "Eliminar";
while ($row = mysqli_fetch_assoc($result)) {
    extract($row);
    echo '<tr>';
    echo '<td> <a href="idteams.php?team_id='.$id_categories.'">' . $id_categories . '</a></td>';
    echo '<td>' . $description_photos . '</td>';
    echo '<td>' . $preview . '</td>';
    echo '<td> <a href="catego.php?type=equipo&team_id='.$team_id.'">' . $eliminar . '</a></td>';
    echo '</tr>';
}    
 /*AQUI ACABA LA TABLA*/
?>
 </table>
 <?php
                $accion = $_GET['action'];
                if($accion == "add"){
                $query =  
                'select
                id_categories, description_photos 
                FROM
                categories';
                $result = mysqli_query($db,$query) or die(mysqli_error($db));
                
                echo <<<ENDHTML
                <h1>Introduce una nueva categoria</h1>
                <form method="post" action="catego.php">
                <p>Nombre Categoria:
                <input type="text" name="nombre"/>
                </p>
                <p>Preview Categoria:
                <input type="text" name="preview"/>
                </p>
                <p>
                <input type="submit" name="enviar" value="Enviar"/>
                </p>
                </form>
            
ENDHTML;
            }

            ?>
            <?php
			$db = mysqli_connect('localhost', 'root') or die ('Unable to connect. Check your connection parameters.');
                mysqli_select_db($db,'photoweb') or die(mysqli_error($db));
                $nombre= $_POST['nombre'];
                $preview= $_POST['preview'];         
                $query=<<<insert
                INSERT INTO categories
                (description_photos, preview)
                VALUES 
                ("$nombre","$preview");
insert;

mysqli_query($db, $query) or die(mysqli_error($db));
$query=<<<delete
								DELETE FROM categories WHERE preview = "";

delete;

mysqli_query($db, $query) or die(mysqli_error($db));
     
?>
<?php
			$db = mysqli_connect('localhost', 'root') or die ('Unable to connect. Check your connection parameters.');
			if($db->connect_errno){
				echo "error";
            }
            
				mysqli_select_db($db,'photoweb') or die(mysqli_error($db));
				
				if(!isset($_GET['do']) || $_GET['do'] != 1){
					switch ($_GET['type']){
						case 'equipo':
						echo "Seguro que quieres eliminar esta categoria?<br/>";
						break;
					}
					echo '<a href="'. $_SERVER['REQUEST_URI'] .'&do=1">Yes</a> ' ;
					echo 'or <a href="tabla.php">No</a>';
				}else{
					switch($_GET['type']){
						case 'equipo':
							$team_id = $_GET['team_id'];
							$query=<<<delete
								DELETE FROM categories WHERE id_categories = $id_categories;

delete;
						mysqli_query($db,$query) or die(mysqli_error($db));
						echo("La categoria se ha eliminado correctamente!");
						echo("<br/>");
						break;

				
				}
			}
				
   ?>       
            
                    
            
    </body>
</html>
</div>
