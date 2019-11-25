<?php
$db = mysqli_connect('localhost', 'root') or 
die ('Unable to connect. Check your connection parameters.');
mysqli_select_db($db, 'clima') or die(mysqli_error($db));
$chiv=0;

if(!isset($_GET['orden'])){
    $_GET['orden']="codi";
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

$query = "SELECT idCiutat,codi,nom,poblacio
    FROM
        ciutat
        ORDER BY  $campoTabla $ordenar ";
$result = mysqli_query($db, $query) or die(mysqli_error($db));
$row = mysqli_fetch_assoc($result);
extract($row);

$tabla= "";
$tabla.=<<<TABLE
<div style=text-align:center;margin:auto>
    <h3><em>Datos Ciudades</em></h3>
       <table border=1 style=margin:auto>
             <tr>
                 <th>Id</th>
                 <th>Codigo</th>
                 <th><a href=adminp2.php?orden=nom&ascdesc=$ordenar>Nombre</a></th>
                 <th>Poblacion</th>
             </tr>
TABLE;

$tabla.=<<<TABLE
<tr>
    <td>$idCiutat</td>
    <td>$codi</td>
    <td>$nom</td>
    <td>$poblacio</td>
</tr>
TABLE;
echo '<a href="add2.php?action=add"> [ADD]</a>';
echo ' <a href="delete2.php?type=ciutat&id=' . $row['idCiutat'] . '"> [DELETE]</a>';

while ($row = mysqli_fetch_assoc($result)) {
    extract($row);
    $tabla.=<<<TABLE
       <tr>
	     <td>$idCiutat</td>
	     <td>$codi</td>
	     <td>$nom</td>
	     <td>$poblacio</td>
	   </tr>
TABLE;
echo ' <a href="delete2.php?type=ciutat&id=' . $row['idCiutat'] . '"> [DELETE]</a>';
}
$tabla.=<<<TABLE
        </table>
    </div>
TABLE;
echo $tabla;



$query = "SELECT
        idTemps,nom,tempAlta,tempBaixa,precipitacio,color
    FROM
        Ciutat c, Temps t 
    WHERE c.idCiutat=t.cfCiutat";
$result = mysqli_query($db, $query) or die(mysqli_error($db));
$row = mysqli_fetch_assoc($result);
extract($row);

$table= "" ;
$table.=<<<TABLE
<div style=text-align:center;margin:auto>
    <h3><em>Datos Ciudades</em></h3>
       <table border=1 style=margin:auto>
             <tr>
             	 <th>idTemps</th>
                 <th>Nombre</th>
                 <th>Temperatura Alta</th>
                 <th>Temperatura Baixa</th>
                 <th>Precipitacio</th>
                 <th>Color</th>
              
             </tr>
TABLE;


$table.=<<<TABLE
	<tr>
		<td>$idTemps</td>
	    <td>$nom</td>
	    <td>$tempAlta</td>
	    <td>$tempBaixa</td>
	    <td>$precipitacio</td>
	    <td>$color</td>
	</tr>
TABLE;


while ($row = mysqli_fetch_assoc($result)) {
    extract($row);
    if ($color==3){
    $table.=<<<TABLE
       <tr style="background-color:red;">
       TABLE;
   }
   if ($color==2){
    $table.=<<<TABLE
       <tr style="background-color:yellow;">
       TABLE;
   }
  if ($color==1){
    $table.=<<<TABLE
       <tr style="background-color:blue;">
       TABLE;
   }

   $table.=<<<TABLE
    <td>$idTemps</td>
	<td>$nom</td>
    <td>$tempAlta</td>
    <td>$tempBaixa</td>
    <td>$precipitacio</td>
    <td>$color</td>
    
</tr>
TABLE;

echo '<a href="edit2.php?action=edit&id=' . $row['idTemps'] . '"> [EDIT]</a>';
echo ' <a href="delete2.php?type=temps&id=' . $row['idTemps'] . '&color='.$row['color'].'"> [DELETE]</a>';

}


$table.=<<<TABLE
        </table>

    </div>
TABLE;

echo $table;
mysqli_close($db);
?>