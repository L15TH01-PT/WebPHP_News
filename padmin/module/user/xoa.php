<?php 
if (!isset($_GET["userid"])) {
	header("location:index.php?p=danh-sach-user");
	exit();
} else {
	$id = $_GET["userid"];
	$data = user_edit_data ($conn,$id);
	if ($id == 1 || ($_SESSION["sys_id"] != 1 && $data["level"] == 1)) {
		echo "<script type='text/javascript'>
			alert('Bạn không được phép xóa thành viên này');
			window.location.href = 'index.php?p=danh-sach-user';
		</script>";
		exit();
	} else {
		user_delete($conn,$id);
	}
}

?>