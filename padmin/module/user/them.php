<?php
$error=null;  
if (isset($_POST['btnUserAdd'])) {
	if (empty($_POST['txtUser'])) {
		$error ="Vui lòng nhập user name!";
	}elseif (empty($_POST['txtPass'])) {
		$error ="Vui lòng nhập password!";
	}elseif ($_POST['txtPass'] != $_POST['txtRepass']) {
		$error ="Mật khẩu không trùng khớp!";
	}else{
		$data = array("user"  => $_POST['txtUser'],
					  "pass"  => md5($_POST['txtPass']),
					  "level" => $_POST['rdoLevel']);
		them_user($conn,$data,$error);
	}
}
error_msg($error);
?>
<form action="" method="POST" style="width: 650px;">
	<fieldset>
		<legend>Thông Tin User</legend>
		<span class="form_label">Username:</span>
		<span class="form_item">
			<input type="text" name="txtUser" class="textbox" <?php isset_value_input_text("txtUser") ?> />
		</span><br />
		<span class="form_label">Password:</span>
		<span class="form_item">
			<input type="password" name="txtPass" class="textbox" />
		</span><br />
		<span class="form_label">Confirm password:</span>
		<span class="form_item">
			<input type="password" name="txtRepass" class="textbox" />
		</span><br />
		<span class="form_label">Level:</span>
		<span class="form_item">
			<input type="radio" name="rdoLevel" value="1" /> Admin 
			<input type="radio" name="rdoLevel" value="2" checked="checked" /> Member
		</span><br />
		<span class="form_label"></span>
		<span class="form_item">
			<input type="submit" name="btnUserAdd" value="Thêm User" class="button" />
		</span>
	</fieldset>
</form>    
	