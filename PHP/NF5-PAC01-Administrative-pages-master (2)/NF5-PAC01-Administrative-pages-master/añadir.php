<html>
	<head>
		<title>Tabla</title>
	</head>
	<body>
		<?php
			$db = mysqli_connect('localhost', 'root') or die ('Unable to connect. Check your connection parameters.');    
            mysqli_select_db($db,'adminpages') or die(mysqli_error($db));
            
                
                $accion = $_GET['action'];0
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
            }else{
                function get_category($categoryteam_id) {
                    global $db;
                    $query = 
                        'select categoryteam_name
                    FROM
                        categoryteam
                    WHERE
                        categoryteam_id='.$categoryteam_id;
                    $result = mysqli_query($db,$query) or die(mysqli_error($db));
                    $row = mysqli_fetch_assoc($result);
                    extract($row);
                    return $categoryteam_name;
                }
                function get_captain($member_id) {
                    global $db;
                    $query = 
                        'select member_fullname
                    FROM
                        members
                    WHERE
                        member_id='.$member_id;
                    $result = mysqli_query($db,$query) or die(mysqli_error($db));
                    $row = mysqli_fetch_assoc($result);
                    extract($row);
                    return $member_fullname;
                }
				$query =  'select
                    team_id, team_name, team_category, team_year, team_captain, team_trainer, team_aficionados, team_cost, team_entradas, categoryteam_id, member_id
                FROM
                    team t, categoryteam c, members m
                WHERE
                    team_id = ' . $_GET['team_id'];
                    $result = mysqli_query($db,$query) or die(mysqli_error($db));
					$row = mysqli_fetch_assoc($result);
					$team_id = $_GET['team_id'];
                    $team_name = $row['team_name'];
                    $categoryteam_name = get_category($row['team_category']);
                    $team_year = $row['team_year'];
                    $member_fullname = get_captain ($row['team_captain']);
                    $team_trainer = $row['team_trainer'];
                    $team_aficionados = $row['team_aficionados'];
                    $team_cost = $row['team_cost'];
					$team_entradas = $row['team_entradas'];
					$categoryteam_id = $row['categoryteam_id'];
					$memberid = $row['member_id'];
					
					echo <<<ENDHTML
					<h1>Edita el equipo $team_name</h1>
					<form method="post" action="equipoEditado.php">
					<input type="hidden" name="id" value="$team_id"> 
                	<p>Nombre Equipo:
                	<input type="text" name="nombre" value=$team_name>
					</p>
					<p>Categoria Equipo:
                	<select name = "categoria">
					<option value=$categoryteam_id selected="true">$categoryteam_name</option>
ENDHTML;
					$query =  
					'select
					categoryteam_id, categoryteam_name 
					FROM
					categoryteam';
					$result = mysqli_query($db,$query) or die(mysqli_error($db));
					while ($row = mysqli_fetch_assoc($result)) {
					$categoryid = $row['categoryteam_id'];
					$categoryname = $row['categoryteam_name'];
					echo <<<ENDHTML
					<option value = "$categoryid">$categoryname</option>
ENDHTML;
	}
					echo <<<ENDHTML
					</select>
					</p>
					<p>Año del Equipo:
                	<input type="number" name="fecha" value=$team_year>
					</p>
					<p>Entrenador del Equipo:
                	<input type="text" name="entrenador" value=$team_trainer>
					</p>
					<p>Capitan del Equipo:
                	<select name = "capitan">
					<option value="$memberid" selected="true">$member_fullname</option>
ENDHTML;
					$query =  
					'select
						member_id, member_fullname 
					FROM
						members';
					$result = mysqli_query($db,$query) or die(mysqli_error($db));
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
					<p>Aficionados del Equipo:
                	<input type="number" name="aficionado" value=$team_aficionados>
					</p>
					<p>Coste del Equipo:
                	<input type="number" name="coste" value=$team_cost>
					</p>
					<p>Entradas del Equipo:
                	<input type="number" name="entrada" value=$team_entradas>
					</p>
					<input type="submit" name="actualizar" value="Actualizar"/>
                	</p>
					</form>
ENDHTML;
            }

                
                ?>
    </body>
</html>