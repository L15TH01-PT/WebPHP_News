<?php
$error = null; 
if (isset($_GET["dmid"])) {
	$id = $_GET["dmid"];
	xoa_dm($conn,$id,$error);
	echo "<script>
		alert('Không được phép xóa!');
		window.location.href='index.php?p=danh-sach-danh-muc';
	</script>";
	exit();
} else {
	redirect("index.php?p=danh-sach-danh-muc");
}
?>