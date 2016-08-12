<?php 
$error = null;
if (isset($_GET['dmid'])) {
	$id = $_GET['dmid'];
	$data = thong_tin_sua_dm($conn,$id);
	if (isset($_POST["btnCateEdit"])) {
		if (empty($_POST["txtCateName"])) {
			$error =  "vui lòng nhập cate name";
		}else{
			$name = $_POST["txtCateName"];
			$data = array(
				'name' => $name,
				'id' =>$id
			);
			sua_dm($conn,$data,$error);
		}
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
			<input type="text" name="txtCateName" class="textbox" 
			<?php isset_value_input_text('txtTitle', $data['name']) ?>
			 />
		</span><br />
		<span class="form_label"></span>
		<span class="form_item">
			<input type="submit" name="btnCateEdit" value="Sửa danh mục" class="button" />
		</span>
	</fieldset>
</form>  
