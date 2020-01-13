<?php
$db = mysqli_connect('localhost', 'root') or die ('Unable to connect. Check your connection parameters.');
mysqli_select_db($db, 'comics') or die(mysqli_error($db));
//
$accion = $_GET['action'];
$tipo = $_GET['type'];
$id = $_POST['id'];
$nombre = $_POST['nombre_comic'];
$ano = $_POST['ano_comic'];
$tipocomic = $_POST['tipo_comic'];
$autor1 = $_POST['autor1_comic'];
$autor2 = $_POST['autor2_comic'];
$paginas = $_POST['paginas_comic'];
$coste = $_POST['coste_comic'];
$venta = $_POST['ventas_comic'];

$nombre_people = $_POST['people_fullname'];
$cargo = $_POST['cargo'];

if($cargo=="autor"){
    $autor = 1;
    $director = 0;
}else{
    $autor = 0;
    $director = 1;
}

?>
<html>
 <head>
  <title>Commit</title>
 </head>
 <body>
<?php
if($accion=='add'){
    if($tipo=='comic') {
        $error = array();
        $nombre_comic = isset($nombre) ?
            trim($nombre) : '';
        if (empty($nombre_comic)) {
            $error[] = urlencode('Por favor introduce un nombre para el comic.');
        }
        $tipo_comic = isset($tipocomic) ?
            trim($tipocomic) : '';
        if (empty($tipo_comic)) {
            $error[] = urlencode('Por favor introduce un tipo de comic.');
        }
        $ano_comic = isset($ano) ?
            trim($ano) : '';
        if (empty($ano_comic)) {
            $error[] = urlencode('Por favor introduce un año para el comic.');
        }
        $autor1_comic = isset($autor1) ?
            trim($autor1) : '';
        if (empty($autor1_comic)) {
            $error[] = urlencode('Por favor introduce un autor.');
        }
        $autor2_comic = isset($autor2) ?
            trim($autor2) : '';
        if (empty($autor2_comic)) {
            $error[] = urlencode('Por favor introduce un autor.');
        }
        if (empty($error)) {
            $query = 'INSERT INTO
                comic
                    (nombre_comic, ano_comic, tipo_comic, autor1_comic, autor2_comic, paginas_comic, coste_comic, ventas_comic)
                VALUES
                    ("' . $nombre . '",
                    ' . $ano . ',
                    ' . $tipocomic . ',
                    ' . $autor1 . ',
                    ' . $autor2 . ',
                    ' . $paginas . ',
                    ' . $coste . ',
                    ' . $venta . ')';
                $result = mysqli_query($db, $query) or die(mysqli_error($db));
        }else {
                header('Location:comic.php?action=add&id=' . $id .
                    '&error=' . join($error, urlencode('<br/>')));
        }
    }else{
        $query = 'INSERT INTO
            people
                (people_fullname, people_isautor, people_isdirector)
            VALUES
                ("' . $nombre_people . '",
                 ' . $autor . ',
                 ' . $director . ')';
                 $result = mysqli_query($db, $query) or die(mysqli_error($db));
    }
}else{
    if($tipo=='comic') {
        $error = array();
        $nombre_comic = isset($nombre) ?
            trim($nombre) : '';
        if (empty($nombre_comic)) {
            $error[] = urlencode('Por favor introduce un nombre para el comic.');
        }
        $tipo_comic = isset($tipocomic) ?
            trim($tipocomic) : '';
        if (empty($tipo_comic)) {
            $error[] = urlencode('Por favor introduce un tipo de comic.');
        }
        $ano_comic = isset($ano) ?
            trim($ano) : '';
        if (empty($ano_comic)) {
            $error[] = urlencode('Por favor introduce un año para el comic.');
        }
        $autor1_comic = isset($autor1) ?
            trim($autor1) : '';
        if (empty($autor1_comic)) {
            $error[] = urlencode('Por favor introduce un autor.');
        }
        $autor2_comic = isset($autor2) ?
            trim($autor2) : '';
        if (empty($autor2_comic)) {
            $error[] = urlencode('Por favor introduce un autor.');
        }
        if (empty($error)) {
            $query = 'UPDATE comic SET
                nombre_comic = "' . $nombre . '",
                ano_comic = ' . $ano . ',
                tipo_comic = ' . $tipocomic . ',
                autor1_comic = ' . $autor1 . ',
                autor2_comic = ' . $autor2 . ',
                paginas_comic = ' . $paginas . ',
                coste_comic = ' . $coste . ',
                ventas_comic = ' . $venta . '
            WHERE
                id_comic = ' . $id;
            $result = mysqli_query($db, $query) or die(mysqli_error($db));
        }else {
            header('Location:comic.php?action=edit&id=' . $id .
                '&error=' . join($error, urlencode('<br/>')));
        }
    }else{
        $query = 'UPDATE people SET
                people_fullname = "' . $nombre_people . '",
                people_isautor = ' . $autor . ',
                people_isdirector = ' . $director . '
            WHERE
                people_id = ' . $id;
        $result = mysqli_query($db, $query) or die(mysqli_error($db));
    }
}
?>
  <p>Done!</p>
 </body>
</html>