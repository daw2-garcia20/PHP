<?php
$mysqli=mysqli_connect("127.0.0.1","raulosuna","raulosuna","rauldb") or die("No se puede conectar a la base de datos");

if(isset($_POST['añadir'])){
	$insert="Insert into categories (description) values ('".$_POST['categoria']."')";
	mysqli_query($mysqli,$insert) or die (mysqli_error($mysqli));
}
if(isset($_GET['id'])){
	if($_GET['delete']==2){
		$delete="delete from photos where category_id=".$_GET['id'];
		mysqli_query($mysqli,$delete) or die (mysqli_error($mysqli));
	}else{
		$update="update photos set category_id=0 where category_id=".$_GET['id'];
		mysqli_query($mysqli,$update) or die (mysqli_error($mysqli));
	}
	$delete="delete from categories where id=".$_GET['id'];
	mysqli_query($mysqli,$delete) or die (mysqli_error($mysqli));
}
$select="select * from categories";
$resultado=mysqli_query($mysqli,$select) or die (mysqli_error($mysqli));
?>
<h1>Categorias</h1>
<table>
	<tr>
		<td>ID</td>
		<td>Categoria</td>
		<td>Eliminar categoria</td>
		<td>Eliminar categoria y fotos</td>
	</tr>	
	<?php
	while ($row = mysqli_fetch_assoc($resultado)) {
		echo "<tr>";
		echo "<td>".$row['id']."</td>";
		echo "<td>".$row['description']."</td>";
		echo "<td><a href='".$_SERVER['PHP_SELF']."?id=".$row['id']."&delete=1'>X</a></td>";
		echo "<td><a href='".$_SERVER['PHP_SELF']."?id=".$row['id']."&delete=2'>X</a></td>";
		echo "</tr>";
	}
	?>
</table>
<h1>Añadir categoria</h1>
<form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
	<table>
		<tr>
			<td>Nombre de categoria</td>	<td><input type="text" name="categoria" ></td>
		</tr>
			<td><input type="submit" name="añadir" value="Añadir"></td>
		</tr>
	</table>
</form>
<a href="restablecercategorias.php">Restablecer</a>