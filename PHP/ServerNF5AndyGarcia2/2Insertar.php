<html>
	<head>
		<title>Tabla</title>
	</head>
	<body>
		<?php
			$db = mysqli_connect('localhost', 'root') or die ('Unable to connect. Check your connection parameters.');
			            
            mysqli_select_db($db,'bookweb') or die(mysqli_error($db));
                $isbn= $_POST['isbn'];
                $autor= $_POST['autor'];
                $titulo= $_POST['titulo'];
                

                $query=<<<insert
                INSERT INTO book
                (isbn, author, title, visit, year_book)
                VALUES 
                ($isbn, "$autor", "$titulo", 0, 2019);
insert;

mysqli_query($db, $query) or die(mysqli_error($db));
echo("Tu libro se ha añadido!");
echo("<br/>")
     
?>
<a href="2table.php"><input type="button" value="Volver a la tabla"></a>
        
    </body>
</html>