<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>


</head>

<body>

	<?php
$db = mysqli_connect("127.0.0.1", "alejandro", "root", "game");
mysqli_select_db($db, 'game') or die(mysqli_error($db));
?>


<html>
 <head>
  <title>Game database</title>
  <style type="text/css">
   th { background-color: #C14141;}
   .odd_row { background-color: #EEE; }
   .even_row { background-color: #FFF; }
  </style>
 </head>
 <body>
 <table style="width:100%;">
  <tr>
   <th colspan="2">Games <a href="game.php?action=add">[ADD]</a></th>
  </tr>
<?php
$query = 'SELECT * FROM game';
$result = mysqli_query($db, $query) or die (mysqli_error($db));

$odd = true;
while ($row = mysqli_fetch_assoc($result)) {
    echo ($odd == true) ? '<tr class="odd_row">' : '<tr class="even_row">';
    $odd = !$odd; 
    echo '<td style="width:75%;">'; 
    echo $row['game_name'];
    echo '</td><td>';
    echo ' <a href="game.php?action=edit&id=' . $row['game_id'] . '"> [EDIT]</a>'; 
    echo ' <a href="delete.php?type=game&id=' . $row['game_id'] . '"> [DELETE]</a>';
    echo '</td></tr>';
}
?>
  <tr>
    <th colspan="2">Students <a href="student.php?action=add"> [ADD]</a></th>
  </tr>
<?php
$query = 'SELECT * FROM student';
$result = mysqli_query($db, $query) or die (mysqli_error($db));

$odd = true;
while ($row = mysqli_fetch_assoc($result)) {
    echo ($odd == true) ? '<tr class="odd_row">' : '<tr class="even_row">';
    $odd = !$odd; 
    echo '<td style="width: 25%;">'; 
    echo $row['student_fullname'];
    echo '</td><td>';
    echo ' <a href="student.php?action=edit&id=' . $row['student_id'] .
        '"> [EDIT]</a>'; 
    echo ' <a href="delete.php?type=student&id=' . $row['student_id'] .
        '"> [DELETE]</a>';
    echo '</td></tr>';
}
?>
  </table>
 </body>
</html>