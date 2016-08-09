<?php 
if (isset($_GET["dmid"])) {
	$error = null;
	$id = $_GET["dmid"];
	if (isset($_POST["btnCateEdit"])) {
		if (empty($_POST["txtCateName"])) {
			$error = "Vui lòng nhập danh mục";
		} else {
			$data = array(
				'id'	=> $id,
				'name'	=> $_POST["txtCateName"]
			);
			sua_dm ($conn,$data,$error);
			// sua_dm($conn,$data);
		}
	}
	$data = thong_tin_sua_dm ($conn,$id);
?>

<?php 
error_msg ($error);
?>
<form action="" method="POST" style="width: 650px;">
	<fieldset>
		<legend>Thông Tin Danh Mục</legend>
		<span class="form_label">Tên danh mục:</span>
		<span class="form_item">
			<input type="text" name="txtCateName" class="textbox" value="<?php echo $data["name"] ?>" />
		</span><br />
		<span class="form_label"></span>
		<span class="form_item">
			<input type="submit" name="btnCateEdit" value="Sửa danh mục" class="button" />
		</span>
	</fieldset>
</form>  

<?php
} else {
	redirect("index.php?p=danh-sach-danh-muc");
}
?>

	