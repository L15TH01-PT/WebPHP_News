<?php  
	if (!isset($_GET['ttid'])) {
		redirect('index.php?p=danh-sach-tin-tuc');
	}else{
		$id = $_GET['ttid'];
		$error = null;
		$data=tin_tuc_can_sua($conn,$id);
		if (isset($_POST["btnNewsEdit"])) {
		if ($_POST["sltCate"] == "none") {
			$error = "Vui lòng chọn danh mục";
		} elseif (empty($_POST["txtTitle"])) {
			$error = "Vui lòng nhập tiêu đề";
		} elseif (empty($_POST["txtAuthor"])) {
			$error = "Vui lòng nhập tên tác giả";
		} elseif (empty($_POST["txtIntro"])) {
			$error = "Vui lòng nhập trích dẫn";
		} elseif (empty($_POST["txtFull"])) {
			$error = "Vui lòng nhập nội dung tin";
		} else {
			$data = array(
				'id'	=> $id,
				'category_id'	=> $_POST["sltCate"],
				'title'	=> $_POST["txtTitle"],
				'author'=> $_POST["txtAuthor"],
				'intro'	=> $_POST["txtIntro"],
				'content'	=> $_POST["txtFull"],
				'new_image'	=> change_image_name ($_FILES["newsImg"]["name"]),
				'image_tmp' =>$_FILES["newsImg"]["tmp_name"],
				'status'=> $_POST["rdoPublic"],
				'time_news'	=> time()
			);

			if (empty($_FILES["newsImg"]["name"])) {
				// echo 'sửa không hình';
				sua_khong_hinh ($conn,$data);
			} else {
				if (!in_array(get_extension($_FILES["newsImg"]["name"]),$fileExt)) {
					$error = "File hình không hợp lệ!";
				} else {
					// echo 'sửa có hình';
					sua_co_hinh ($conn,$data,$error);
				}
			}
		}
	}
?>

<?php 
error_msg ($error);
?>

<form action="" method="POST" enctype="multipart/form-data" style="width: 650px;">
	<fieldset>
		<legend>Sửa Tin Tức</legend>
		<span class="form_label">Tên danh mục:</span>
		<span class="form_item">
			<select name="sltCate" class="select">
				<option value="none">Chọn danh mục</option>
					<?php
					if (isset($_POST['sltCate'])) {
						news_cate_data($conn,$_POST["sltCate"]) ;
					}else{
						news_cate_data($conn,$data['category_id']) ;
					}
					 ?>
			</select>
		</span><br />
		<span class="form_label">Tiêu đề tin:</span>
		<span class="form_item">
			<input type="text" name="txtTitle" class="textbox" 
				<?php isset_value_input_text('txtTitle', $data['title']) ?>
			/>
		</span><br />
		<span class="form_label">Tác gỉả:</span>
		<span class="form_item">
			<input type="text" name="txtAuthor" class="textbox"
				<?php isset_value_input_text('txtAuthor', $data['author']) ?>
			/>
		</span><br />
		<span class="form_label">Trích dẫn:</span>
		<span class="form_item">
			<textarea name="txtIntro" rows="5" class="textbox"><?php isset_value_input_text_area('txtIntro', $data['intro']) ?></textarea>
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
			<textarea name="txtFull" rows="8" class="textbox"><?php isset_value_input_text_area('txtFull', $data['content']) ?></textarea>
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
		<span class="form_label">Hình hiện tại:</span>
		<span class="form_item">
			<img src="../images/tintuc/<?php echo $data['image'] ?>" width="100px" />
		</span><br />
		<span class="form_label">Hình đại diện:</span>
		<span class="form_item">
			<input type="file" name="newsImg" class="textbox" />
		</span><br />
		<span class="form_label">Công bố tin:</span>
		<span class="form_item">
			<input type="radio" name="rdoPublic" value="1" 
				<?php if ($data['status'] == 1) {
					echo 'checked';
				} ?>
			/> Có 
			<input type="radio" name="rdoPublic" value="0" 
				<?php if ($data['status'] == 0) {
					echo 'checked';
				} ?>
			/> Không
		</span><br />
		<span class="form_label"></span>
		<span class="form_item">
			<input type="submit" name="btnNewsEdit" value="Sửa tin" class="button" />
		</span>
	</fieldset>
</form>
	<?php } ?>