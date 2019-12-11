<?php
  $db = mysqli_connect('localhost', 'root') or die ('Unable to connect. Check your connection parameters.');
  mysqli_select_db($db, 'pruebaexamen2') or die(mysqli_error($db));
  
$orden = $_GET['orden'];
if($orden == "ASC"){
  $orden = "DESC";
}else{
  $orden = "ASC";
}
  $tabla .=<<<ENDHTML
  <html>  
    <head>
        <title>Página de Administración</title>
        <style>
          table{
            border: 1px solid black;
            border-collapse: collapse;
            margin: auto;
            width: 750px;
          }
          tr{
            border: 1px solid black;
            height: 30px;
          }
          th{
            font-size: 20px;
          }
        </style>
    </head>
    <body>
        <h1 style="text-align: center;">Página de administración</h1>
ENDHTML;
//_____________________________TABLA DE CIUDADES_________________________________
  $tabla.= <<<ENDHTML
    <table style="width: 750px;">
      <tr>
        <th colspan="4" style="text-align:center;">Ciudades</th>
        <th><a href="ciudad.php?action=add"><button>ADD</button></a></th>
      </tr>
      <tr>
        <th><a href="admin.php?orden=$orden">Nombre</a></th>
        <th>Código</th>
        <th>Población</th>
        <th></th>
        <th></th>
      </tr>
ENDHTML;
  $query = "SELECT id_ciudad, nombre_ciudad, codigo_ciudad, poblacion
            FROM ciudad
            ORDER BY nombre_ciudad $orden";
  $result = mysqli_query($db, $query) or die(mysqli_error($db));
  extract($row);
  while ($row = mysqli_fetch_assoc($result)) {
    extract($row);
    $nombre = $nombre_ciudad;
    $codigo = $codigo_ciudad;
    $poblacion_ciudad = $poblacion;
    $tabla .= <<<ENDHTML
      <tr style="text-align: center;">
        <td>$nombre</td>
        <td>$codigo</td>
        <td>$poblacion_ciudad</td>
        <td><a href="ciudad.php?action=edit&id=$id_ciudad"><button>EDIT</button></a></td>
        <td><a href="delete.php?type=ciudad&id=$id_ciudad"><button>DELETE</button></a></td>
      </tr>
ENDHTML;
  }
$tabla.= <<<ENDHTML
  </table>  
ENDHTML;
//__________________________________________________________________________________
$tabla.= <<<ENDHTML
  <br>
  <br>
ENDHTML;
//______________________________TABLA DE TIEMPO__________________________________
$tabla.= <<<ENDHTML
  <table>
    <tr>
      <th colspan ="7" style="text-align:center;">Tiempo</th>
      <th><a href="tiempo.php?action=add"><button>ADD</button></a></th>
    </tr>
    <tr style="text-align: center;">
      <th>Ciudad</th>
      <th>T. Max</th>
      <th>T. Min</th>
      <th>Precipitación</th>
      <th>Fecha</th>
      <th>Color</th> 
      <th></th> 
      <th></th> 
    </tr>
ENDHTML;
  $query = 'SELECT id_tiempo, cf_ciudad, temp_alta, temp_baja, precipitacion, fecha, color, nombre_ciudad
            FROM ciudad,tiempo
            WHERE id_ciudad = cf_ciudad';
  $result = mysqli_query($db, $query) or die(mysqli_error($db));
  extract($row);
  while ($row = mysqli_fetch_assoc($result)) {
    extract($row);
    $nombre = $nombre_ciudad;
    $tmax = $temp_alta;
    $tmin = $temp_baja;
    $lluvia = $precipitacion;
    $date = $fecha;
    $colores = $color;
    if($color==1){
      $codigocolor = '#009EFF';
    }
    if($color==2){
      $codigocolor = '#FFF700';
    }
    if($color==3){
      $codigocolor = '#FF6400';
    }
    $tabla .= <<<ENDHTML
      <tr style="text-align: center;">
        <td>$nombre</td>
        <td>$tmax ºC</td>
        <td>$tmin ºC</td>
        <td>$lluvia %</td>
        <td>$date</td>
        <td style="background-color:$codigocolor;">$colores</td>
        <td><a href="tiempo.php?action=edit&id=$id_tiempo"><button>EDIT</button></a></td>
        <td><a href="delete.php?type=tiempo&id=$id_tiempo"><button>DELETE</button></a></td>
      </tr>
ENDHTML;
  }
  echo $tabla;
?>
    </table>
  </body>
</html>  