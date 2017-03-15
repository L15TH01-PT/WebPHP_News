<?php 
include '../../config.php';
include '../../library/connect.php';
include '../../model/model_user.php';
include '../../library/function.php';
$data = array("user"  => $_POST['txtUser'],
			  "pass"  => md5($_POST['txtPass']),
			  "level" => $_POST['rdoLevel']);
$error = "";
them_user($conn,$data,$error);
echo $error;
