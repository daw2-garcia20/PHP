<html>
	<head>
		<title>Tabla libros</title>
	</head>
	<body>
		<?php
			$db = mysqli_connect('localhost', 'root') or die ('Unable to connect. Check your connection parameters.');
			            
                mysqli_select_db($db,'bookweb') or die(mysqli_error($db));
                $query =  
'select id_book, isbn, author,title,visit,year_book 
    FROM
        book
    WHERE
        id_book>0';
$result = mysqli_query($db,$query) or die(mysqli_error($db));

// determine number of rows in returned result
$num_team = mysqli_num_rows($result);

function get_id($id_book) {

    global $db;

    $query = 'SELECT 
            id_book 
       FROM
            book
       WHERE
           id_book = ' . $id_book;
    $result = mysqli_query($db, $query) or die(mysqli_error($db));

    $row = mysqli_fetch_assoc($result);
    extract($row);

    return $id_book;
}
?>
<div style="text-align: center;">
 <h2>Listado Libros</h2>
 <a href='2añadir.php?action=add'>Añadir</a>
 <table border="1" cellpadding="2" cellspacing="2"
  style="width: 70%; margin-left: auto; margin-right: auto;">
   <th>Id</th>
   <th>ISBN</th>
   <th>Autor</th>
    <th>Titulo</th>
    <th>Visitas</th>
    <th>Año</th>
    <th>Eliminar</th>
    <th>Eliminar autor+libro</th>
    <th>Editar</th>
<?php
// loop through the results
$editar = "Editar";
$eliminar = "Eliminar";
$eliminarautorlibro = "Eliminar autor+libro";
$colores = $year_book;
    if($year_book>2000){
      $codigocolor = 'blue';
    }else{
        $codigocolor = 'green';
    }
    
while ($row = mysqli_fetch_assoc($result)) {
    extract($row);
    $colores = $year_book;
    if($year_book>2000){
      $codigocolor = 'green';
    }else{
        $codigocolor = 'blue';
    }
    echo '<tr>';
    echo '<td>' . $id_book . '</td>';
    echo '<td>' . $isbn . '</td>';
    echo '<td>' . $author . '</td>';
    echo '<td>' . $title . '</td>';
    echo '<td>' . $visit . '</td>';
    echo '<td style="background-color:'.$codigocolor.';">' . $colores . '</td>';
    echo '<td> <a href="2eliminar.php?type=libro&team_id='.$id_book.'">' . $eliminar . '</a></td>';
    echo '<td> <a href="2eliminarautorlibro.php?type=libro&team_id='.$id_book.'">' . $eliminarautorlibro . '</a></td>';
    echo '<td> <a href="2añadir.php?action=editar&people_id='.$id_book.'">' . $editar . '</a></td>';
    echo '</tr>';
}    