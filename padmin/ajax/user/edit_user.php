<?php 
session_start(); 
include '../../../config.php';
include '../../../library/connect.php';
include '../../../model/model_user.php';
include '../../../library/function.php';

$data = array("user"  => $_POST['txtUser'],
			  "oldPass"  => md5($_POST['txtPass']),
			  "newPass" => md5($_POST['txtNewPass']),
			  "level" => $_POST['rdoLevel'],
			  "id" => $_POST['txtId'],
			  );
if ($data['oldPass'] == $data['newPass']) {
	echo '2';
}else{
	$result = user_edit1($conn, $data);
	if ($result == 1) {
		echo "1";
	}else{
		echo "0";
	}
}



