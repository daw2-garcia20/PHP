<html>
    <head>
    </head>
    <body>
        <?php
            $db = mysqli_connect('localhost', 'root') or 
            die ('Unable to connect. Check your connection parameters.');
    
            mysqli_select_db($db,'examen') or die(mysqli_error($db));
            
            $consulta = 'SELECT nombre_autor as nombre, apellido_autor as contrasena, nacionalidad_autor as edad 
                        FROM autor';
                        
                        
            $result = mysqli_query($db,$consulta) or die(mysqli_error($db));
            
            
        
            
            $noRegistros = 1; //Registros por página
            $pagina = 1; //Por defecto pagina = 1
            
            if($_GET['pagina'])
              $pagina = $_GET['pagina']; //Si hay pagina, lo asigna
            
            $buskr=$_GET['searchs']; //Palabra a buscar
            //Utilizo el comando LIMIT para seleccionar un rango de registros
            $sSQL = "SELECT * FROM autor WHERE nombre_autor LIKE '%$buskr%' LIMIT ".($pagina-1)*$noRegistros.", $noRegistros";
            $result = mysqli_query($db,$sSQL) or die(mysqli_error($db));
            //Exploracion de registros
            echo "<table>";
            while($row = mysqli_fetch_array($result)) {
                $table.=<<<TABLE
                <tr>
                <td height=80; align=center>$row[id_autor]<br></td>
                <td align=center>$row[nombre_autor]</td>
                <td align=center>$row[apellido_autor]</td>
                <td align=center>$row[nacionalidad_autor]</td>
                </tr>
TABLE;
            }
            //Imprimiendo paginacion
            $sSQL = "SELECT count(*) FROM autor WHERE nombre_autor LIKE '%$buskr%'";
            
            //Cuento el total de registros
            $result = mysqli_query($db,$sSQL);
            $row = mysqli_fetch_array($result);
            $totalRegistros = $row["count(*)"]; //Almaceno el total
            $noPaginas = ceil($totalRegistros/$noRegistros); //Determino la cantidad de paginas
            
            $siguiente=$pagina;
            $anterior=$pagina;

            if($pagina > 1){
                $anterior=$anterior-1;
            }

            if($pagina < $noPaginas){
                $siguiente=$siguiente+1;
            }
        
       $table.=<<<TABLE
            <tr>
            <td colspan=2 align=center><?php echo <strong>Total registros: </strong>$totalRegistros</td>
            <td colspan=2 align=center><?php echo <strong>Pagina: </strong>$pagina</td>
            </tr>
            <td><a href=?pagina=1>Inicio</a></td>
            <td><a href=?pagina=$siguiente>Siguiente</a></td>
            <td><a href=?pagina=$anterior>Anterior</a></td>
            <td><a href=?pagina=$noPaginas>Fin</a></td>
            </tr>
        </table>
    </body>
</html>
TABLE;
echo $table;
?>

