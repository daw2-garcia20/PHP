<?php
  $db = mysqli_connect('localhost', 'root') or die ('Unable to connect. Check your connection parameters.');
  mysqli_select_db($db, 'comics') or die(mysqli_error($db));
  //
  $tabla .=<<<ENDHTML
  <html>  
    <head>
        <title>Página de Administración</title>
        <style>
          table{
            border: 1px solid black;
            border-collapse: collapse;
            width: 500px;
            margin: auto;
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
//_____________________________TABLA DE COMICS_________________________________
  $tabla.= <<<ENDHTML
    <table>
      <tr>
        <th style="text-align:center;">comics</th>
        <th colspan="2"><a href="comic.php?action=add"><button>ADD</button></a></th>
      </tr>
ENDHTML;

  $query = 'SELECT id_comic, nombre_comic
            FROM comic';
  $result = mysqli_query($db, $query) or die(mysqli_error($db));
  extract($row);

  while ($row = mysqli_fetch_assoc($result)) {
    extract($row);
    $nombre = $nombre_comic;
    $tabla .= <<<ENDHTML
      <tr>
        <td>$nombre</td>
        <td><a href="comic.php?action=edit&id=$id_comic"><button>EDIT</button></a></td>
        <td><a href="delete.php?type=comic&id=$id_comic"><button>DELETE</button></a></td>
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


  echo $tabla;
?>
    </table>
  </body>
</html>  

