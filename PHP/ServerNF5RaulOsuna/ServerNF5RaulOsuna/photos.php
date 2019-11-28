<?php
$mysqli=mysqli_connect("127.0.0.1","raulosuna","raulosuna","rauldb") or die("No se puede conectar a la base de datos");
$tabla1="Create table photos 
(id int(11) unsigned not null auto_increment,
filename varchar(64) not null default '',
comment varchar(255) default null,
category_id int(11) unsigned not null default '0',
primary key (id))
";
$tabla2="create table categories (
id int(11) unsigned not null auto_increment,
description varchar(100) not null default '',
primary key (id)
)";
$insert1="insert into categories (description) values ('Abstacte'),('Animals'),('Objectes'),('Persones'),('Plantes'),('Fixe')";
$insert2="Insert into photos (filename,comment,category_id) values ('Untitled.png','Cosa con paint',1),('Untitled.png','Otra cosa con Paint',2),('Untitled.png','cosa ',3),('Untitled.png','examen',6)";
/*
mysqli_query($mysqli,"drop table photos") or die (mysqli_error($mysqli));
mysqli_query($mysqli,"drop table categories") or die (mysqli_error($mysqli));
mysqli_query($mysqli,$tabla1) or die (mysqli_error($mysqli));
mysqli_query($mysqli,$tabla2) or die (mysqli_error($mysqli));
mysqli_query($mysqli,$insert1) or die (mysqli_error($mysqli));
mysqli_query($mysqli,$insert2) or die (mysqli_error($mysqli));
*/


if(isset($_POST['añadir'])){
	$insert="Insert into photos (filename,comment,category_id) values ('".$_POST['foto']."','".$_POST['comment']."',".$_POST['categories'].")";
	mysqli_query($mysqli,$insert) or die (mysqli_error($mysqli));
}
if(isset($_GET['id'])){
	$delete="delete from photos where id=".$_GET['id'];
	mysqli_query($mysqli,$delete) or die (mysqli_error($mysqli));
}
$select="select photos.id,filename,comment,description from photos, categories where photos.category_id=categories.id";
$resultado=mysqli_query($mysqli,$select) or die (mysqli_error($mysqli));
?>
<h1>Fotos</h1>
<?php
echo "<table>";
	while ($row = mysqli_fetch_assoc($resultado)) {
		echo "<tr>";
		echo "<td>".$row['id']."</td>";
		echo "<td><img src='".$row['filename']."' witdh='20px' height='20px'/></td>";
		echo "<td>".$row['comment']."</td>";
		echo "<td>".$row['description']."</td>";
		if($row['description']!="Fixe"){
			echo "<td><a href='".$_SERVER['PHP_SELF']."?id=".$row['id']."'>Eliminar</a></td>";
		}
		echo "<tr>";
	}
?>
</table>
<h1>Añadir Fotos</h1>
<form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
	<table>
		<tr>
			<td>Nombre del archivo</td>	<td><input type="text" name="foto" value="Untitled.png"></td>
		</tr>
		<tr>
			<td>Categoria</td><td><select name="categories">
				<?php
				$select="select * from categories";
				$resultado=mysqli_query($mysqli,$select) or die (mysqli_error($mysqli));
				while ($row = mysqli_fetch_assoc($resultado)) {
					echo "<option value=".$row['id'].">".$row['description']."</option>";
				}
				?>
			</select></td>
		</tr>
		<tr>
			<td>Comentario</td><td><input type="text" name="comment"></td>
		</tr>
		<tr>
			<td><input type="submit" name="añadir" value="Añadir"></td>
		</tr>
	</table>
</form>
<a href="restablecerfotos.php">Restablecer</a>