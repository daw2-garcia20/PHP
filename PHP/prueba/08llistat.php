<?php
//Conectar MYSQL
$db = mysqli_connect('localhost', 'root') or 
    die ('Unable to connect. Check your connection parameters.');
//Conectar a la BD gente
mysqli_select_db($db,'gente') or die(mysqli_error($db));
//CONDICION PARA CONTROLAR LAS VARIABLES GET
//si no está seteada la variable GET campo la seteo por defecto y también seteo la variable GET nombre 
if(!isset($_GET['orden'])){
    $_GET['orden']="nombre_gente";
    $_GET['ascdesc']="ASC";
}else{//en caso contrario
    if($_GET['ascdesc']=='ASC'){//si GET['orden] es ASC (ascendente) 
        $_GET['ascdesc']='DESC';
    }else{ //si no, entonces GET['orden] es DESC (descendente) 
        $_GET['ascdesc']='ASC';
    }
}
$campoTabla = $_GET['orden']; //declaro variable campo en la que guardo la variable GET campo
$ordenar = $_GET['ascdesc']; //declaro variable modoOrden en la que guardo la variable GET orden
// RECUPERAMOS DATOS
$query = "SELECT
        id_gente, nombre_gente, password_gente, edad_gente
    FROM
        gente 
        ORDER BY  $campoTabla $ordenar ";
$result = mysqli_query($db, $query) or die(mysqli_error($db));
$row = mysqli_fetch_assoc($result);
extract($row);
$tabla.=<<<TABLE
<div style=text-align:center;margin:auto>
    <h3><em>Datos Gente</em></h3>
       <table border=1 style=margin:auto>
             <tr>
                 <th><a href=08llistat.php?orden=id_gente&ascdesc=$ordenar>ID</a></th>
                 <th><a href=08llistat.php?orden=nombre_gente&ascdesc=$ordenar>Nombre</a></th>
                 <th><a href=08llistat.php?orden=password_gente&ascdesc=$ordenar>Password</a></th>
                 <th><a href=08llistat.php?orden=edad_gente&ascdesc=$ordenar>Edad</a></th>
             </tr>
TABLE;
$tabla.=<<<TABLE
<tr>
    <td>$id_gente</td>
    <td>$nombre_gente</td>
    <td>$password_gente</td>
    <td>$edad_gente</td>
</tr>
TABLE;
//Bucle para recorrer las filas e insertar los datos a cada campo de la tabla
while ($row = mysqli_fetch_assoc($result)) {
    extract($row);
    $tabla.=<<<TABLE
        <tr>
            <td>$id_gente</td>
            <td>$nombre_gente</td>
            <td>$password_gente</td>
            <td>$edad_gente</td>
        </tr>
TABLE;
}
$tabla.=<<<TABLE
        </table>
    </div>
TABLE;
echo $tabla;
mysqli_close($db);
?>