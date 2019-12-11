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
                $query =  
'select team_id, team_name, categoryteam_name, team_year, member_fullname, team_trainer, team_aficionados, team_cost, team_entradas
      
    FROM
        team t, categoryteam c, members m
    WHERE
        (t.team_category=c.categoryteam_id) and (t.team_captain=m.member_id)';
$result = mysqli_query($db,$query) or die(mysqli_error($db));

// determine number of rows in returned result
$num_team = mysqli_num_rows($result);

function get_id($team_id) {

    global $db;

    $query = 'SELECT 
            team_id 
       FROM
           team
       WHERE
           team_id = ' . $team_id;
    $result = mysqli_query($db, $query) or die(mysqli_error($db));

    $row = mysqli_fetch_assoc($result);
    extract($row);

    return $team_id;
}
?>
<div style="text-align: center;">
 <h2>Review Team Site</h2>
 <a href='añadir.php?action=add'>Añadir</a>
 <table border="1" cellpadding="2" cellspacing="2"
  style="width: 70%; margin-left: auto; margin-right: auto;">
   <th>Team Name</th>
   <th>Team Category</th>
   <th>Team Year</th>
   <th>Team Captain</th>
   <th>Team Trainer</th>
    <th>Editar</th>
    <th>Eliminar</th>
<?php
// loop through the results
$editar = "Editar";
$eliminar = "Eliminar";
while ($row = mysqli_fetch_assoc($result)) {
    extract($row);
    echo '<tr>';
    echo '<td> <a href="idteams.php?team_id='.$team_id.'">' . $team_name . '</a></td>';
    echo '<td>' . $categoryteam_name . '</td>';
    echo '<td>' . $team_year . '</td>';
    echo '<td>' . $member_fullname . '</td>';
    echo '<td>' . $team_trainer . '</td>';
    echo '<td> <a href="añadir.php?action=editar&team_id='.$team_id.'">' . $editar . '</a></td>';
    echo '<td> <a href="eliminar.php?type=equipo&team_id='.$team_id.'">' . $eliminar . '</a></td>';
    echo '</tr>';
}     
?>
 </table>
 
 <?php
    $query =<<<select
        SELECT people_id, people_fullname
        FROM people
select;
function get_idpeople($people_id) {

    global $db;

    $query = 'SELECT 
            people_id 
       FROM
           people
       WHERE
           people_id = ' . $people_id;
    $result = mysqli_query($db, $query) or die(mysqli_error($db));

    $row = mysqli_fetch_assoc($result);
    extract($row);

    return $people_id;
}
$result = mysqli_query($db,$query) or die(mysqli_error($db));
$num_people = mysqli_num_rows($result);
 ?>
 <div style="text-align: center;">
 <h2>People</h2>
 <a href='añadirpeople.php?action=add'>Añadir</a>
 <table border="1" cellpadding="2" cellspacing="2"
  style="width: 70%; margin-left: auto; margin-right: auto;">
   <th>People Name</th>
   <th>Editar</th>
   <th>Eliminar</th>
   
   <?php
// loop through the results
$editarpeople = "Editar";
$eliminarpeople = "Eliminar";
while ($row = mysqli_fetch_assoc($result)) {
    extract($row);
    echo '<tr>';
    echo '<td>' . $people_fullname . '</td>';
    echo '<td> <a href="añadirpeople.php?action=editar&people_id='.$people_id.'">' . $editarpeople . '</a></td>';
    echo '<td> <a href="eliminar.php?type=persona&people_id='.$people_id.'">' . $eliminarpeople . '</a></td>';
    echo '</tr>';
}    
 
?>
 </table>
 <p><?php echo $num_people; ?> Personas</p>

</div>
