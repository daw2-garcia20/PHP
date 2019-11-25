<?php
$db = mysqli_connect("127.0.0.1", "alejandro", "root", "clima");
mysqli_select_db($db, 'clima') or die(mysqli_error($db));
if ($_GET['action'] == 'edit') {
    //retrieve the record's information 
    $query = 'SELECT
           idCiutat,codi,nom,poblacio
        FROM
           ciutat';
    $result = mysqli_query($db, $query) or die(mysqli_error($db));
    extract(mysqli_fetch_assoc($result));
} else {
    //set values to blank
    $game_name = '';
    $game_type = 0;
    $game_year = date('Y');
    $game_leadactor = 0;
    $game_director = 0;
}
?>
<html>
 <head>
  <title><?php echo ucfirst($_GET['action']); ?>game</title>
 </head>
 <body>
  <form action="commit2.php?action=<?php echo $_GET['action']; ?>&type=ciudad"
   method="post">
   <table>
    <tr>
     <td>Id ciutat</td>
     <td><input type="text" name="idciutat"
      value=""/></td>
    </tr>
     <tr>
     <td>Codi</td>
     <td><input type="text" name="codi"
      value=""/></td>
    </tr>
     <tr>
     <td>Nom</td>
     <td><input type="text" name="nom"
      value=""/></td>
    </tr>
     <tr>
     <td>Poblacio</td>
     <td><input type="text" name="poblacio"
      value=""/></td>
    </tr>
    

      <input type="submit" name="submit"
       value="<?php echo ucfirst($_GET['action']); ?>" />
     </td>
    </tr>
   </table>
  </form>
 </body>
</html>
