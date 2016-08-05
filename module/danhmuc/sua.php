<?php  
$error = null;
if (isset($_GET['id'])) {
	if (isset($_POST['btnSua'])) {
		if (empty($_POST['txtname'])) {
			$error = "Vui lòng nhập tên danh mục";
		}else{
			$stmt = $conn ->prepare("UPDATE category SET name=:name where id=:id");
			$stmt->bindParam(':name',$_POST['txtname'],PDO::PARAM_STR);
			$stmt->bindParam('id',$_GET['id'],PDO::PARAM_INT);
			$stmt->execute();
		}
	}
}
echo $error;
?>
<form action="" method="POST" accept-charset="utf-8">
	<table>
		<tr>
			<td>Name</td>
			<td> <input type="text" name="txtname" value="" placeholder="Vui lòng nhập tên danh mục"> </td>
		</tr>
		<tr>
			<td colspan="2"> <input type="submit" name="btnSua" value="Sửa"> </td>
		</tr>
	</table>
</form>