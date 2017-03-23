<script type="text/javascript">
	function add_user(){
		$.ajax({
			type:"POST",
			url:"ajax/add_user.php",
			data:$("#frmAddUser").serializeArray(),
			success: function(data)
			{
				if(data == 1){
					alert("Them thanh cong");
					$("input[name*='txtUser']").val("");
					$("input[name*='txtPass']").val("");
					$("input[name*='txtRepass']").val("");
				}else{
					alert("Them that bai");
				}
			}
		});
	}
</script>
<form action="" id="frmAddUser" method="POST" style="width: 650px;">
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
			<input type="button" name="btnUserAdd" value="Thêm User" class="button" onclick="add_user()" />
		</span>
		<div id="result">
			
		</div>
	</fieldset>
</form>    
	