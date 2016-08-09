<?php
$error = null; 
if (isset($_GET["dmid"])) {
	$id = $_GET["cid"];
	cate_delete_2($conn,$id,$error);
	// error_msg($error);
	echo "<script>
		alert('Không được phép xóa!');
		window.location.href='index.php?p=danh-sach-danh-muc';
	</script>";
	exit();
} else {
	redirect("index.php?p=danh-sach-danh-muc");
}

?>