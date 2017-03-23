
$(function(){
    show_user_list();
    });

function add_user() {
	if (document.getElementById('name').value == "" || document.getElementById('password').value == "" || document.getElementById('repassword').value == "") {
	alert("Vui lòng không bỏ trống!");
	} else {
		if(document.getElementById('password').value == document.getElementById('repassword').value)
		{
			$.ajax({
				type:"POST",
				url:"../padmin/ajax/user/add_user.php",
				data:$("#frmAddUser").serializeArray(),
				success: function(data)
				{
					if(data == 1){
						alert("Thêm thành công");
						$("input[name*='txtUser']").val("");
						$("input[name*='txtPass']").val("");
						$("input[name*='txtRePass']").val("");
						$('#user_table').html("");
						show_user_list();
					}else{
						alert("Thêm thất bại, vui lòng kiểm tra lại");
					}
				}
			});
		}else{
			alert("Mật khẩu không khớp");
		}
	}
}
function delete_user($id){
    if (confirm("Xác nhận xóa?") == true) {
    	$.ajax({
    		type:"POST",
            url:"ajax/user/delete_user.php",
            data: {id:$id},
			success: function(data){
					if(data == 1){
						alert("Xóa thành công");
						$('#user_table').html("");
						show_user_list();
					}else{
						alert("Xóa thất bại, vui lòng kiểm tra lại");
					}
				}
    	});
    }
}
function aaa (user_id,user_name,user_level,user_pass){
	div_show();
	if (user_id == 1) {
		alert("Không thể sửa Super admin");
		div_hide();
	}
	$("#name_pop").html("Sửa User");
	$("#submit").html("Sửa");
	$('#submit').attr( 'href', 'javascript:edit_user()');
	$('#name').attr( 'disabled', 'false' );
	if (user_level == 1) {
		document.getElementById('B').removeAttribute('checked');
		$('#A').attr( 'checked', 'checked' );
	}else{
		document.getElementById('A').removeAttribute('checked');
		$('#B').attr( 'checked', 'checked' );
	}
	
	document.getElementById('newPassword').style.display = "block";
	document.getElementById('name').value = user_name;
	document.getElementById('hidden_user_id').value = user_id;
}

function edit_user(){
	
	document.getElementById('name').removeAttribute('disabled');

	new_pass = document.getElementById('newPassword').value;
	re_new_pass = document.getElementById('repassword').value;

	if (new_pass != re_new_pass) {
		alert("Mật khẩu không trùng, vui lòng kiểm tra lại");
	}else{
		$.ajax({
			url: '../padmin/ajax/user/edit_user.php',
			type: "POST",
			data: $("#frmAddUser").serializeArray(),
			success: function(dataReturn){
				if (dataReturn == 1) {
					alert("Sửa thành công");
					$("input[name*='txtPass']").val("");
					$("input[name*='txtNewPass']").val("");
					$("input[name*='txtRePass']").val("");
					$('#user_table').html("");
					show_user_list();
					div_hide();
				}else if(dataReturn == 2){
					alert("Mật khẩu trùng với mật khẩu cũ, vui lòng kiểm tra lại!");
				}else{
					alert("Sửa thất bại!");
				}
			}
		});	
	}																									
}

function show_user_list(){
	$id = $("input#user").attr("data-id");
	$level = $("input#user").attr("data-level");
	$.ajax({
		
		url:"../padmin/ajax/user/load_ds_user.php",
		success: function(data)
		{
			$('#user_table').append(data);
		}
	});
}

function div_show() {
	document.getElementById('addForm').style.display = "block";
	document.getElementById('newPassword').style.display = "none";
	
	$("#name_pop").html("Thêm User");
	$("#submit").html("Thêm");
	$('#submit').attr( 'href', 'javascript:add_user()' );
	document.getElementById('name').removeAttribute('disabled');
	document.getElementById('name').value = "";
}
function div_hide(){
	document.getElementById('addForm').style.display = "none";
}