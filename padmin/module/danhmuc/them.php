<!-- Các file trong modules chứa các chứng năng -->
<?php 
$error = null;
if (isset($_POST["btnCateAdd"])) {
	if (empty($_POST["txtCateName"])) {
		$error =  "Vui lòng nhập tên danh mục!";
	}else{
		$name = $_POST["txtCateName"];
		$parent_id = $_POST["sltCate"];
		$data = array(
			'name' => $name,
			'parent_id' => $parent_id
		);
		them_dm($conn,$data,$error);
		
	}
}
 ?>
<?php
	error_msg($error);
 ?>
<form action="" method="POST" style="width: 650px;">
	<fieldset>
		<legend>Thông Tin Danh Mục</legend>
		<span class="form_label">Danh mục cha:</span>
		<span class="form_item">
			<select name="sltCate" class="select">
				<option value="0">--- ROOT ---</option>
				<!-- Giữ lại danh mục khi nhấn button nhưng ko nhập gì -> báo lỗi -->
				<?php dm_cha($conn,$parent_id = 0, $str="--|",$_POST["sltCate"]); ?>
			</select>
		</span><br />
		<span class="form_label">Tên danh mục:</span>
		<span class="form_item">
			<input type="text" name="txtCateName" class="textbox" />
		</span><br />
		<span class="form_label"></span>
		<span class="form_item">
			<input type="submit" name="btnCateAdd" value="Thêm danh mục" class="button" />
		</span>
	</fieldset>
</form>  
