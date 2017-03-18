// Validating Empty Field
$(function(){
    //do something
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
				url:"../padmin/ajax/add_user.php",
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
	// alert($abc);
    if (confirm("Xác nhận xóa?") == true) {
     
    	$.ajax({
    		type:"POST",
            url:"ajax/delete_user.php",
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

function edit_user($abc){
	alert($abc);
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
	$id = $("input#user").attr("data-id");
	$level = $("input#user").attr("data-level");
	$.ajax({
		
		url:"../padmin/ajax/load_ds_user.php",
		success: function(data)
		{
			$('#user_table').append(data);
		}
	});
}