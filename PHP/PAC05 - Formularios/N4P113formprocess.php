<?php
$genero1 = $_POST['genero1'];
$genero2 = $_POST['genero2'];
$genero3 = $_POST['genero3'];
$genero4 = $_POST['genero4'];
$genero5 = $_POST['genero5'];
$genero6 = $_POST['genero6'];
?>
<html>
 <head>
  <title>Añadir comentario</title>
 </head>
 <body>
  <form action="N4P113formprocess.php" method="post">
    <p>Elije tu genero favorito:</p>
    <select name="genero">
      <?php
        echo "<option value='$genero1'>$genero1</option>";    
        echo "<option value='$genero2'>$genero2</option>";  
        echo "<option value='$genero3'>$genero3</option>";    
        echo "<option value='$genero4'>$genero4</option>"; 
        echo "<option value='$genero5'>$genero5</option>";     
        echo "<option value='$genero6'>$genero6</option>";
      ?>
    </select>
    <input type="submit" name="submit" value="Submit" />
  </form>
 </body>
</html>