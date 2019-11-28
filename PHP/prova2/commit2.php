<?php
$db = mysqli_connect('localhost', 'root') or 
die ('Unable to connect. Check your connection parameters.');
mysqli_select_db($db, 'clima') or die(mysqli_error($db));
?>
<html>
 <head>
  <title>Commit</title>
 </head>
 <body>

<?php
switch ($_GET['action']) {
case 'add':
    switch ($_GET['type']) {
    case 'ciudad':
        $query = 'INSERT INTO ciutat (idCiutat,codi,nom,poblacio)
            VALUES
                ("'. $_POST['idciutat'] . '",
                 "' . $_POST['codi'] . '",
                 "' . $_POST['nom'] . '",
                 "' . $_POST['poblacio'] . '")';
             }
        echo $query;
        break;
case 'edit':
    switch ($_GET['type']) {
    
    case 'tiempo':
        $query = 'UPDATE temps SET
                tempAlta = "' . $_POST['tempAlta'] . '",
                tempBaixa = ' . $_POST['tempBaixa'] . ',
                precipitacio = ' . $_POST['precipitacio'] . ',
                color = ' . $_POST['color'] . '
            WHERE
                idTemps = ' . $_POST['idTemps'];
        break;
    }
    break;
}

if (isset($query)) {
    $result = mysqli_query($db, $query) or die(mysqli_error($db));
}
?>
  <p>Done!</p>
  <a href="adminp2.php">Volver al Index</a></p>
 </body>
</html>
