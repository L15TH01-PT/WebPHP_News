<?php 
if (!isset($_GET["userid"])) {
	header("location:index.php?p=danh-sach-user");
	exit();
} else {
	$id = $_GET["userid"];
	$data = user_edit_data ($conn,$id);
	$error = null;
	$edit_myself = null;
	if ($_SESSION["sys_id"] == $id) {
	    $edit_myself = true;
	} else {
	    $edit_myself = false;
	}

	if ($_SESSION["sys_id"] != 1 && ($id == 1 || ($data["level"] == 1 && $edit_myself == false))) {
		echo "<script type='text/javascript'>
			alert('Bạn không được phép sửa thành viên này');
			window.location.href = 'index.php?p=danh-sach-thanh-vien';
		</script>";
		exit();
	}
	if (isset($_POST["btnUserEdit"])) {
		if ($edit_myself == true && empty($_POST["txtPass"])) {
			$error = "Vui lòng nhập mật khẩu";
		} elseif ($_POST["txtPass"] != $_POST["txtRepass"]) {
			$error = "Hai mật khẩu không trùng khớp";
		} else {
			if ($edit_myself == false && empty($_POST["txtPass"])) {
				$pass = $data["pass"];
			} else {
				$pass = md5($_POST["txtPass"]);
			}

			if ($edit_myself == true) {
				$level = $data["level"];
			} else {
				$level = $_POST["rdoLevel"];
			}

			$data = array(
					'id'    => $id,
					'pass'  => $pass,
					'level' => $level
				);
			user_edit ($conn,$data);
		}
	}	

error_msg($error);
?>
<form action="" method="POST" style="width: 650px;">
	<fieldset>
		<legend>Thông Tin User</legend>
		<span class="form_label">Username:</span>
		<span class="form_item">
			<input disabled type="text" name="txtUser" class="textbox" value="<?php echo $data["user"] ?>" />
		</span><br />
		<span class="form_label">Password:</span>
		<span class="form_item">
			<input type="password" name="txtPass" class="textbox" />
		</span><br />
		<span class="form_label">Confirm password:</span>
		<span class="form_item">
			<input type="password" name="txtRepass" class="textbox" />
		</span><br />
		<?php 
		if ($edit_myself == false) {
		?>
		<span class="form_label">Level:</span>
		<span class="form_item">
			<input type="radio" name="rdoLevel" value="1"
			<?php 
			if ($data["level"] == "1") {
				echo "checked";
			}
			?>
			 /> Admin 
			<input type="radio" name="rdoLevel" value="2"
			<?php 
			if ($data["level"] == "2") {
				echo "checked";
			}
			?>
			 /> Member
		</span><br />
		<?php } ?>
		<span class="form_label"></span>
		<span class="form_item">
			<input type="submit" name="btnUserEdit" value="Sửa User" class="button" />
		</span>
	</fieldset>
</form>
<?php 
}
?>