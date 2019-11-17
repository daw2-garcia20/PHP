<html>
    <head>
    </head>
    <body>
        <?php
            $db = mysqli_connect('localhost', 'root') or 
            die ('Unable to connect. Check your connection parameters.');
    
            mysqli_select_db($db,'librostexto') or die(mysqli_error($db));
            
            $consulta = 'SELECT nombre_libro as nombre, tipo_libro as tipo, cliente.cliente_fullname as nombre_cliente
                        FROM libro, tipolibro, cliente
                        WHERE (libro.tipo_libro = tipolibro.tipolibro_id)AND(cliente.cliente_id=libro.autor1_libro)';
                        
                            
            $result = mysqli_query($db,$consulta) or die(mysqli_error($db));
            
            while ($row = mysqli_fetch_assoc($result)){
                extract($row);
                echo $nombre. "-"  . $tipo. "-" . $nombre_cliente . "<br/>";
            }
            
        
            
            $noRegistros = 1; //Registros por página
            $pagina = 1; //Por defecto pagina = 1
            
            if($_GET['pagina'])
              $pagina = $_GET['pagina']; //Si hay pagina, lo asigna
            
            $buskr=$_GET['searchs']; //Palabra a buscar
            //Utilizo el comando LIMIT para seleccionar un rango de registros
            $sSQL = "SELECT * FROM libro WHERE nombre_libro LIKE '%$buskr%' LIMIT ".($pagina-1)*$noRegistros.", $noRegistros";
            $result = mysqli_query($db,$sSQL) or die(mysqli_error($db));
            //Exploracion de registros
            echo "<table>";
            while($row = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td height=80; align=center>".$row[id_libro]."<br></td>";
                echo "<td align=center>$row[nombre_libro].</td>";
                echo "<td align=center>$row[ano_libro].</td>";
                echo "</tr>";
            }
            //Imprimiendo paginacion
            $sSQL = "SELECT count(*) FROM libro WHERE nombre_libro LIKE '%$buskr%'";
            
            //Cuento el total de registros
            $result = mysqli_query($db,$sSQL);
            $row = mysqli_fetch_array($result);
            $totalRegistros = $row["count(*)"]; //Almaceno el total
            $noPaginas = $totalRegistros/$noRegistros; //Determino la cantidad de paginas
            
        ?>
       
            <tr>
            <td colspan="2" align="center"><?php echo "<strong>Total registros: </strong>".$totalRegistros.";" ?></td>
            <td colspan="2" align="center"><?php echo "<strong>Pagina: </strong>".$pagina.";" ?></td>
            </tr>
            <tr bgcolor="f3f4f1">
            <td colspan="4" align="right"><strong>Pagina:
        <?php
        
            for($i = 1; $i < $noPaginas+1; $i++) { //Imprimo las paginas
                if($i == $pagina)
                echo "<font color=red>".$i."</font>"; //No link
                else
                echo "<a href=\"?pagina=".$i."&searchs=".$buskr."\" style=color:#000;> ".$i."</a>"; 
            }
        ?>
        
</strong></td>
</tr>
</table>
            
    </body>
</html>

