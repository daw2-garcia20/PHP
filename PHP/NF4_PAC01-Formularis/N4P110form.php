<?php
$db = mysqli_connect('localhost', 'root') or 
    die ('Unable to connect. Check your connection parameters.');
$query = 'CREATE DATABASE IF NOT EXISTS reviews';
mysqli_query($db,$query) or die(mysqli_error($db));
mysqli_select_db($db,'reviews') or die(mysqli_error($db));
$query = 'SELECT
        nombre_comic
    FROM
        comic';
$result = mysqli_query($db, $query) or die(mysqli_error($db));
extract($row);
?>
<html>
 <head>
  <title>Añadir comentario</title>
 </head>
 <body>
  <form action="N4P111formprocess.php" method="post">
    <p>Selecciona el comic al que va dirigido el comentario.</p>
    <select name="nombre_comic">
      <?php
      while ($row = mysqli_fetch_assoc($result)) {
        extract($row);
        echo "<option value='$nombre_comic'>$nombre_comic</option>";
      }
      ?>
    </select>
    <p>Introduce el nombre del revisionario:</p>
    <input type="text" name="name"/>
    <p>Introduce un rating del 1 al 5:</p>
    <input type="number" name="rating" min="1" max="5" />
    <p>Introduce la fecha de la revisión(formato Año-Mes-Dia):</p>
    <input type="text" name="date"/>
    <p>Introduce la review:</p>
    <textarea name="comentario" rows="10" cols="40">Aqui puedes escribir la review</textarea>
    <input type="submit" name="submit" value="Submit" />
  </form>
 </body>
</html>