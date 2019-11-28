<?php
$db = mysqli_connect("127.0.0.1", "alejandro", "root", "game");
mysqli_select_db($db, 'game') or die(mysqli_error($db));
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
    case 'game':
        $query = 'INSERT INTO
            game
                (game_name, game_year, game_type, game_leadactor,
                game_director)
            VALUES
                ("' . $_POST['game_name'] . '",
                 ' . $_POST['game_year'] . ',
                 ' . $_POST['game_type'] . ',
                 ' . $_POST['game_leadactor'] . ',
                 ' . $_POST['game_director'] . ')';
        break;
    case 'student':
        $query = 'INSERT INTO student
            (student_fullname, student_isactor, student_isdirector)
        VALUES
            ("' . $_POST['student_fullname'] . '",
            ' . $_POST['student_isactor'] . ',
            ' . $_POST['student_isdirector'] . ')';
        break;
    }
    break;
case 'edit':
    switch ($_GET['type']) {
    case 'game':
        $query = 'UPDATE game SET
                game_name = "' . $_POST['game_name'] . '",
                game_year = ' . $_POST['game_year'] . ',
                game_type = ' . $_POST['game_type'] . ',
                game_leadactor = ' . $_POST['game_leadactor'] . ',
                game_director = ' . $_POST['game_director'] . '
            WHERE
                game_id = ' . $_POST['game_id'];
        break;
    case 'student':
        $query = 'UPDATE student SET
                student_fullname = "' . $_POST['student_fullname'] . '",
                student_isactor = "' . $_POST['student_isactor'] . '",
                student_isdirector = "' . $_POST['student_isdirector'] . '"
            WHERE
                student_id = ' . $_POST['student_id'];
        break;
    }
    break;
}

if (isset($query)) {
    $result = mysqli_query($db, $query) or die(mysqli_error($db));
}
?>
  <p>Done!</p>
  <a href="tabla.php">Volver al Index</a></p>
 </body>
</html>
