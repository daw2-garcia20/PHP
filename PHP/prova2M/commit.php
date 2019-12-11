<?php
$db = mysqli_connect('localhost', 'root') or die ('Unable to connect. Check your connection parameters.');
mysqli_select_db($db, 'pruebaexamen2') or die(mysqli_error($db));
//
$accion = $_GET['action'];
$tipo = $_GET['type'];
$id = $_POST['id'];
$codigo = $_POST['codigo_ciudad'];
$nombre = $_POST['nombre_ciudad'];
$pobl = $_POST['poblacion'];
$ciudad = $_POST['nombre_ciudad'];
$tempMax = $_POST['temp_alta'];
$tempMin = $_POST['temp_baja'];
$lluvia = $_POST['precipitacion'];
$fecha = $_POST['fecha'];
$color = $_POST['color'];
?>
<html>
 <head>
  <title>Commit</title>
 </head>
 <body>
<?php
if($accion=='add'){
    if($tipo=='ciudad') {
        $query = 'INSERT INTO
            ciudad
                (codigo_ciudad, nombre_ciudad, poblacion)
            VALUES
                ("' . $codigo . '",
                 "' . $nombre . '",
                 ' . $pobl . ')';
            $result = mysqli_query($db, $query) or die(mysqli_error($db));
    }else{
        $query = 'INSERT INTO
            tiempo
                (cf_ciudad, temp_alta, temp_baja, precipitacion, fecha, color)
            VALUES
                (' . $ciudad . ',
                 ' . $tempMax . ',
                 ' . $tempMin . ',
                 ' . $lluvia . ',
                 "' . $fecha . '",
                 ' . $color . ')';
                 $result = mysqli_query($db, $query) or die(mysqli_error($db));
    }
}else{
    if($tipo=='ciudad') {
        $query = 'UPDATE ciudad SET
                codigo_ciudad = "' . $codigo . '",
                nombre_ciudad = "' . $nombre . '",
                poblacion = ' . $pobl . '
            WHERE
                id_ciudad = ' . $id;
        $result = mysqli_query($db, $query) or die(mysqli_error($db));
    }else{
        $query = 'UPDATE tiempo SET
                cf_ciudad = ' . $nombre . ',
                temp_alta = ' . $tempMax . ',
                temp_baja = ' . $tempMin . ',
                precipitacion = ' . $lluvia . ',
                fecha = "' . $fecha . '",
                color = ' . $color . '
            WHERE
                id_tiempo = ' . $id;
        $result = mysqli_query($db, $query) or die(mysqli_error($db));
    }
}
?>
  <p>Done!</p>
 </body>
</html>