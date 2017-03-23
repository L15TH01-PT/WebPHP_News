$(function(){
    show_category_list();
    });

function add_category(){
	name = document.getElementById('txtTenDM').value;
	id = document.getElementById('sltCate').value;
	if (document.getElementById('txtTenDM').value!="") {
		$.ajax({
			type:"POST",
			url:"../padmin/ajax/category/add_category.php",
			data: {name:name, parent_id:id},
			success: function(data){
				if (data == 1) {
					alert("Thêm thành công");
					$("input[name*='txtTenDM']").val("");
					$('#category_table').html("");
					show_category_list();
				}else{
					alert("Thêm thất bại, vui lòng kiểm tra lại");
				}
			}
		});
	}else{
		alert("Vui lòng nhập tên danh mục");
	}
}

function edit_category(id,parent_id,name){
	div_show_category();
	$("#pop_name").html("Sửa Danh Mục");
	$("#submit").html("Sửa");
	$('#submit').attr( 'href', 'javascript:edit_category()' );
	$('#parent').attr('style', 'display: block;');
	document.getElementById("parent").value = name;
	
	if (id == 1) {
		alert("Không thể sửa trang chủ!");
		div_hide_category();
	}else{
		$.ajax({
			url: 'ajax/category/edit_category.php',
			type: 'POST',
			data: {id: id,parent_id:parent_id,name:name},
			success: function(dataReturn){
				if (dataReturn == 1) {
					alert("Xóa thành công");
					$('#category_table').html("");
					show_category_list();
				}else{
					// alert("Không thể xóa danh mục cha, vui lòng kiểm tra lại");
				}
			}
		});	
	}
}

function delete_category(id){
	if (id == 1) {
		alert("Không thể xóa trang chủ");
	}else{
		if (confirm("Xác nhận xóa?") == true) {
			$.ajax({
				url: 'ajax/category/delete_category.php',
				type: 'POST',
				data: {id: id},
				success: function(dataReturn){
					if (dataReturn == 1) {
						alert("Xóa thành công");
						$('#category_table').html("");
						show_category_list();
					}else{
						alert("Không thể xóa danh mục cha, vui lòng kiểm tra lại");
					}
				}
			});
		}
	}
}

function show_category_list(){
	$.ajax({
		
		url:"../padmin/ajax/category/load_ds_category.php",
		success: function(data)
		{
			$('#category_table').append(data);
		}
	});
}


function div_show_category() {
	document.getElementById('addCateForm').style.display = "block";
	document.getElementById('parent').style.display = "none";
	$("#pop_name").html("Thêm Danh Mục");
	$("#submit").html("Thêm");
	$('#submit').attr( 'href', 'javascript:add_category()' );
}
function div_hide_category(){
	document.getElementById('addCateForm').style.display = "none";
}