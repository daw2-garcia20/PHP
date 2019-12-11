<html>
	<head>
		<title>Tabla</title>
	</head>
	<body>
		<?php
			$db = mysqli_connect('localhost', 'root') or die ('Unable to connect. Check your connection parameters.');
			            
            mysqli_select_db($db,'adminpages') or die(mysqli_error($db));
                $nombre= $_POST['nombre'];
                $query=<<<insert
                INSERT INTO people
                (people_fullname)
                VALUES 
                ("$nombre");
insert;

mysqli_query($db, $query) or die(mysqli_error($db));
echo("Tu persona se ha añadido!");
echo("<br/>")
     
?>
<a href="tabla.php"><input type="button" value="Volver a la tabla"></a>
        
    </body>
</html>