<?php
$db = mysqli_connect('localhost', 'root') or 
    die ('Unable to connect. Check your connection parameters.');
$query = 'CREATE DATABASE IF NOT EXISTS reviews';
mysqli_query($db,$query) or die(mysqli_error($db));
mysqli_select_db($db,'reviews') or die(mysqli_error($db));
$nombrecomic = $_POST['nombre_comic'];
$valoracion = $_POST['rating'];
$comentarios = $_POST['comentario'];
$nombre = $_POST['name'];
$fecha = $_POST['date'];
$query = "SELECT
        id_comic
    FROM
        comic
    WHERE nombre_comic = '$nombrecomic'";
$result = mysqli_query($db, $query) or die(mysqli_error($db));
$row = mysqli_fetch_assoc($result);
extract($row);
$insert = "INSERT INTO reviews (review_comic_id,review_date,reviewer_name,review_comment,review_rating) VALUES('$id_comic','$fecha','$nombre','$comentarios','$valoracion')";
mysqli_query($db, $insert) or die(mysqli_error($db));
$enlace .= <<<ENDHTML
    <p>Se ha añadido los valores al comic para ver las reviews actualizadas <a href="NP4111reviewcomments.php?idcomic2=$id_comic&orden=review_date">haz click aqui</a>'</p>
ENDHTML;
echo $enlace;
?>