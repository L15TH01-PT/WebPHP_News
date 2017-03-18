// Validating Empty Field
function add_user() {

	if (document.getElementById('name').value == "" || document.getElementById('password').value == "" || document.getElementById('repassword').value == "") {
	alert("Vui lòng không bỏ trống !");
	} else {
		if(document.getElementById('password').value == document.getElementById('repassword').value)
		{
				$.ajax({
					type:"POST",
					url:"../padmin/ajax/add_user.php",
					data:$("#frmAddUser").serializeArray(),
					success: function(data)
					{
						if(data == 1){
							// alert("Them thanh cong");

							$("input[name*='txtUser']").val("");
							$("input[name*='txtPass']").val("");
							$("input[name*='txtRePass']").val("");
							show_user_list();
						}else{
							alert("Them that bai");
						}
					}
			});
		}else{
			alert("Mật khẩu không khớp");
		}
	}
}
//Function To Display Popup
function div_show() {
	document.getElementById('addForm').style.display = "block";
}
//Function to Hide Popup
function div_hide(){
	document.getElementById('addForm').style.display = "none";
}

function show_user_list(){
	alert("user list");
}