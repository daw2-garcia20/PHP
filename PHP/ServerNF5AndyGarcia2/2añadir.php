<html>
	<head>
		<title>Tabla</title>
	</head>
	<body>
		<?php
			$db = mysqli_connect('localhost', 'root') or die ('Unable to connect. Check your connection parameters.');
			            
            mysqli_select_db($db,'bookweb') or die(mysqli_error($db));
                $accion = $_GET['action'];
                if($accion == "add"){
                $query =  
                'SELECT
                 p.name_people 
                FROM
                 book b, people p
                WHERE 
                b.author=p.id_people';
                $result = mysqli_query($db,$query) or die(mysqli_error($db));
                
                echo <<<ENDHTML
                <h1>Introduce un nuevo libro</h1>
                <form method="post" action="2Insertar.php">
                <p>isbn :
                <input type="text" name="isbn"/>
                </p>
                <p>autor :
                <input type="number" name="autor"/>
                </p>
                <p>titulo:
                <input type="text" name="titulo"/>
                </p>
                
ENDHTML;
                /*while ($row = mysqli_fetch_assoc($result)) {
                $author = $row['author'];
                
                $categoryname = $row['author'];
                echo <<<ENDHTML
                <option value = "$author">$categoryname</option>
                while ($row = mysqli_fetch_assoc($result)) {
                    
                    
                    echo <<<ENDHTML
                    <option value = "$author">$result</option>
ENDHTML;
                }*/
                
                
                
                
                echo <<<ENDHTML
                
                
                <p>
                <input type="submit" name="enviar" value="Enviar"/>
                </p>
                </form>
            
ENDHTML;
            }
            if($accion == "editar"){
                $query =  
                'SELECT
                 * 
                FROM
                 book ';
                $result = mysqli_query($db,$query) or die(mysqli_error($db));
                
                echo <<<ENDHTML
                <h1>Que libro quieres editar?</h1>
                <form method="post" action="2Editar.php">
                <p>Id de libro a editar :
                <input type="number" name="ideditar" />
                </p>
                <p>isbn :
                <input type="text" name="isbn" default="$isbn"/>
                </p>
                <p>autor :
                <input type="number" name="autor"/>
                </p>
                <p>titulo:
                <input type="text" name="titulo"/>
                </p>
                
ENDHTML;
                /*while ($row = mysqli_fetch_assoc($result)) {
                $author = $row['author'];
                
                $categoryname = $row['author'];
                echo <<<ENDHTML
                <option value = "$author">$categoryname</option>
                while ($row = mysqli_fetch_assoc($result)) {
                    
                    
                    echo <<<ENDHTML
                    <option value = "$author">$result</option>
ENDHTML;
                }*/
                
                
                
                
                echo <<<ENDHTML
                
                
                <p>
                <input type="submit" name="enviar" value="Enviar"/>
                </p>
                </form>
            
ENDHTML;
            }

                
                ?>
    </body>
</html>