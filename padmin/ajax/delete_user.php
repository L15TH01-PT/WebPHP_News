<?php 
session_start(); 
include '../../config.php';
include '../../library/connect.php';
include '../../model/model_user.php';
include '../../library/function.php';

	$id = $_POST["id"];
	$data = user_edit_data ($conn,$id);
	$sys_id = $_SESSION["sys_id"];

	if ($id == 1 || ($sys_id != 1 && $data["level"] == 1)) {
		// // echo "2";	
		echo "0";	
	} else {
		user_delete($conn,$id);
		// // echo "1";
		echo "1";
	}