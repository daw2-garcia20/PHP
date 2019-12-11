<?php
$db = mysqli_connect('localhost', 'root') or die ('Unable to connect. Check your connection parameters.');
mysqli_select_db($db, 'pruebaexamen2') or die(mysqli_error($db));
//
$do = $_GET['do'];
$tipo = $_GET['type'];
$id = $_GET['id'];
if (!isset($do) || $do != 1) {
    if($tipo == 'ciudad'){
        echo 'Estás seguro que quieres borrar esta ciudad?<br/>';
    }else{
        echo 'Estás seguro que quieres borrar este tiempo?<br/>';
    } 
    echo '<a href="' . $_SERVER['REQUEST_URI'] . '&do=1">si</a> '; 
    echo 'or <a href="admin.php">no</a>';
}else{
    if($tipo == 'ciudad') {
        $query = 'SELECT id_ciudad
                    FROM ciudad
                    WHERE id_ciudad = ' . $id;
        $result = mysqli_query($db, $query) or die(mysqli_error($db));
        $row = mysqli_fetch_assoc($result);
        extract($row);
        $idciudad = $id_ciudad;
        $query = 'SELECT color
                    FROM tiempo
                    WHERE cf_ciudad = ' . $idciudad;
        $result = mysqli_query($db, $query) or die(mysqli_error($db));
        while($row = mysqli_fetch_assoc($result)){
            extract($row);
            if($color<3){
                $colores = $colores+1;
                $menor3 = $menor3+1;
            }else{
                $colores = $colores+1;
            }
        }
        if($colores==$menor3){
            $query = 'UPDATE tiempo SET
                    cf_ciudad = 0 
                WHERE
                    cf_ciudad = ' . $id;
            $result = mysqli_query($db, $query) or die(mysqli_error($db));
            $query = 'DELETE FROM ciudad 
                WHERE
                    id_ciudad = ' . $id;
            $result = mysqli_query($db, $query) or die(mysqli_error($db));
            echo '<p style="text-align: center;">Tu ciudad ha sido borrada.';
        }else{
            echo '<p style="text-align: center;">La ciudad no se puede borrar porque el color está en rojo.';
        }
            echo '<a href="admin.php">Volver a la administración</a></p>'
?>
<?php
    }else{
        $query = 'SELECT color
                    FROM tiempo
                WHERE id_tiempo = ' . $id;
        $result = mysqli_query($db, $query) or die(mysqli_error($db));
        $row = mysqli_fetch_assoc($result);
        extract($row);
        if($color<3){
            $query = 'DELETE FROM tiempo 
                WHERE
                    id_tiempo = ' . $id;
            $result = mysqli_query($db, $query) or die(mysqli_error($db));
            echo '<p style="text-align: center;">Tu tiempo ha sido borrado.';
        }else{
            echo 'El tiempo no se puede borrar porque el color esta en rojo';
        }
?>
<a href="admin.php">Volver a la administración</a></p>
<?php
    }
}
?>