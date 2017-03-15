<?php 
include '../../config.php';
include '../../library/connect.php';
include '../../model/model_user.php';
include '../../library/function.php';

	$id = $_GET["userid"];
	$data = user_edit_data ($conn,$id);
	if ($id == 1 || ($_SESSION["sys_id"] != 1 && $data["level"] == 1)) {
		echo "2";	
	} else {
		user_delete($conn,$id);
		echo "1";
	}