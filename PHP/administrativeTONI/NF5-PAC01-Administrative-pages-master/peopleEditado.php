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