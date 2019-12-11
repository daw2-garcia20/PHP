<html>
	<head>
		<title>Tabla</title>
	</head>
	<body>
		<?php
			$db = mysqli_connect('localhost', 'root') or die ('Unable to connect. Check your connection parameters.');
			            
            mysqli_select_db($db,'bookweb') or die(mysqli_error($db));
                
                $ideditar= $_POST['ideditar'];
                $isbn = $_POST['isbn'];
                $autor = $_POST['autor'];
                $titulo = $_POST['titulo'];
                $query=<<<update
                UPDATE book SET
                isbn = "$isbn", author="$autor",title = "$titulo"
                WHERE
                id_book = $ideditar
update;
                mysqli_query($db,$query) or die(mysqli_error($db));
                echo("Tu datos han sido actualizados.");
                echo("<br/>");
        ?>

    <a href="2table.php"><input type="button" value="Volver a la tabla"></a>
    </body>
</html>