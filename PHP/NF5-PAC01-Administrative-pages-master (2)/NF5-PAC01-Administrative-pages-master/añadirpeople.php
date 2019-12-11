<html>
	<head>
		<title>Tabla</title>
	</head>
	<body>
		<?php
			$db = mysqli_connect('localhost', 'root') or die ('Unable to connect. Check your connection parameters.');
			            
            mysqli_select_db($db,'adminpages') or die(mysqli_error($db));
                $accion = $_GET['action'];
                if($accion == "add"){
                $query =  
                'select
                people_id, people_fullname 
                FROM
                people';
                $result = mysqli_query($db,$query) or die(mysqli_error($db));
                
                echo <<<ENDHTML
                <h1>Introduce una nueva Persona</h1>
                <form method="post" action="insertarPersona.php">
                <p>Nombre Persona:
                <input type="text" name="nombre"/>
                </p>
                <p>
                <input type="submit" name="enviar" value="Enviar"/>
                </p>
                </form>
ENDHTML;

                
            
            }else{
				$query =  'select
                    people_id, people_fullname
                FROM
                    people
                WHERE
                    people_id = ' . $_GET['people_id'];
                    $result = mysqli_query($db,$query) or die(mysqli_error($db));
					$row = mysqli_fetch_assoc($result);
					$people_id = $_GET['people_id'];
                    $people_fullname = $row['people_fullname'];
					
					echo <<<ENDHTML
					<h1>Edita la persona $people_fullname</h1>
					<form method="post" action="peopleEditado.php">
					<input type="hidden" name="id" value="$people_id"> 
                	<p>Nombre Persona:
                	<input type="text" name="nombre" placeholder=$people_fullname>
                    </p>
                    <p>
                    <input type="submit" name="enviar" value="Enviar"/>
                    </p>
                    </form>
ENDHTML;
            }
                ?>
    </body>
</html>