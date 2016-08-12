<?php 
$error= null;
if (isset($_POST['btnNewsAdd'])) {
	if ($_POST['sltCate'] == "") {
		$error = 'Vui lòng chọn danh mục';
	}elseif (empty($_POST['txtTitle'])) {
		$error = 'Vui lòng nhập tiêu đề tin';
	}elseif (empty($_POST['txtAuthor'])) {
		$error = 'Vui lòng nhập tác giả';
	}elseif (empty($_POST['txtIntro'])) {
		$error =  'vui lòng nhập trích dẫn';
	}elseif (empty($_POST['txtFull'])) {
		$error = 'Vui lòng nhập nội dung tin';
	}elseif (empty($_FILES['newsImg']['name'])) {
		$error = 'Vui lòng chọn hình hảnh';
	}elseif(!in_array(get_extension($_FILES['newsImg']['name']),$fileExt)){
		$error ="File hình không hợp lệ, vui lòng kiểm tra lại!";
	}
	else{
		$data  = array(
				'category_id' => $_POST['sltCate'],
				'title'       => $_POST['txtTitle'],
				'author'      => $_POST['txtAuthor'],
				'intro'       => $_POST['txtIntro'],
				'content'     => $_POST['txtFull'],
				'image'       => change_image_name($_FILES['newsImg']['name']),
				'image_tmp'	  => $_FILES['newsImg']['tmp_name'],
				'status'      => $_POST['rdoPublic'],
				'time_news'   => time() 
			);
		
		them_tin($conn,$data,$error);
	}
}
error_msg($error);
?>

<form action="" method="POST" enctype="multipart/form-data" style="width: 650px;">
	<fieldset>
		<legend>Thêm tin tức</legend>
		<span class="form_label">Tên danh mục:</span>
		<span class="form_item">
			<select name="sltCate" class="select">
				<option value="">--- ROOT ---</option>
				<!-- Giữ lại danh mục khi nhấn button nhưng ko nhập gì -> báo lỗi -->
				<?php dm_cha($conn,$parent_id = 0, $str="--|",$_POST["sltCate"]); ?>
			</select>
		</span><br />
		<span class="form_label">Tiêu đề tin:</span>
		<span class="form_item">
			<input type="text" name="txtTitle" class="textbox" <?php isset_value_input_text("txtTitle") ?> />
		</span><br />
		<span class="form_label">Tác giả</span>
		<span class="form_item">
			<input type="text" name="txtAuthor" class="textbox" <?php isset_value_input_text("txtAuthor"); ?>/>
		</span><br />
		<span class="form_label">Trích dẫn:</span>
		<span class="form_item">
			<textarea name="txtIntro" rows="5" class="textbox"><?php isset_value_input_text_area("txtIntro"); ?></textarea>
			<script type="text/javascript">
				var editor = CKEDITOR.replace('txtIntro',{
					language:'vi',
					filebrowserImageBrowseUrl : '../library/ckfinder/ckfinder.html?Type=Images',
					filebrowserFlashBrowseUrl : '../library/ckfinder/ckfinder.html?Type=Flash',
					filebrowserImageUploadUrl : '../library/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
					filebrowserFlashUploadUrl : '../library/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
				});
			</script>
		</span><br />
		<span class="form_label">Nội dung tin:</span>
		<span class="form_item">
			<textarea name="txtFull" rows="8" class="textbox"><?php isset_value_input_text_area("txtFull") ?></textarea>
			<script type="text/javascript">
				var editor = CKEDITOR.replace('txtFull',{
					language:'vi',
					filebrowserImageBrowseUrl : '../library/ckfinder/ckfinder.html?Type=Images',
					filebrowserFlashBrowseUrl : '../library/ckfinder/ckfinder.html?Type=Flash',
					filebrowserImageUploadUrl : '../library/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
					filebrowserFlashUploadUrl : '../library/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
				});
			</script>
		</span><br />
		<span class="form_label">Hình đại diện:</span>
		<span class="form_item">
			<input type="file" name="newsImg" class="textbox" />
		</span><br />
		<span class="form_label">Công bố tin:</span>
		<span class="form_item">
			<input type="radio" name="rdoPublic" value="1" checked="checked" /> Có 
			<input type="radio" name="rdoPublic" value="0" /> Không
		</span><br />
		<span class="form_label"></span>
		<span class="form_item">
			<input type="submit" name="btnNewsAdd" value="Thêm tin" class="button" />
		</span>
	</fieldset>
</form>
