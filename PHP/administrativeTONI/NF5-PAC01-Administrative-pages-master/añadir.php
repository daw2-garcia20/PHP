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
                $accion = $_GET['action'];
                if($accion == "add"){
                $query =  
                'select
                categoryteam_id, categoryteam_name 
                FROM
                categoryteam';
                $result = mysqli_query($db,$query) or die(mysqli_error($db));
                
                echo <<<ENDHTML
                <h1>Introduce un nuevo Equipo</h1>
                <form method="post" action="insertarEquipo.php">
                <p>Nombre Equipo:
                <input type="text" name="nombre"/>
                </p>
                <p>Categoria:   
                <select name="categoria">
ENDHTML;
                while ($row = mysqli_fetch_assoc($result)) {
                $categoryid = $row['categoryteam_id'];
                $categoryname = $row['categoryteam_name'];
                echo <<<ENDHTML
                <option value = "$categoryid">$categoryname</option>
ENDHTML;
                }
                $query =  
                'select
                member_id, member_fullname 
                FROM
                members';
                $result = mysqli_query($db,$query) or die(mysqli_error($db));
                echo <<<ENDHTML
                </select>
                </p>
                <p>Año del Equipo:
                <input type="number" name="fecha"/>
                </p>
                <p>Entrenador
                <input type="text" name="entrenador"/>
                </p>
                <p>Capitan
                <select name="capitan">
ENDHTML;
                while ($row = mysqli_fetch_assoc($result)) {
                $memberid = $row['member_id'];
                $memberfullname = $row['member_fullname'];
                echo <<<ENDHTML
                <option value = "$memberid">$memberfullname</option>
ENDHTML;
                }
                echo <<<ENDHTML
                </select>
                </p>
                <p>Aficionados
                <input type="number" name="aficionado"/>
                </p>
                <p>Coste
                <input type="number" name="coste"/>
                </p>
                <p>Entradas
                <input type="number" name="entrada"/>
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