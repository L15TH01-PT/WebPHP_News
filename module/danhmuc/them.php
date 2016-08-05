<?php  
$error = null;
if (isset($_POST['btnThem'])) {
	if (empty($_POST['txtname'])) {
		$error = "Vui lòng nhập tên danh mục";
	}else{
		$name = $_POST['txtname'];
		$stmt = $conn ->prepare("INSERT INTO category(name) values(:name)");
		$stmt->bindParam(':name',$name,PDO::PARAM_STR);
		$stmt->execute();
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
			<td colspan="2"> <input type="submit" name="btnThem" value="Thêm"> </td>
		</tr>
	</table>
</form>