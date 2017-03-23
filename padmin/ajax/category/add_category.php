<?php 
include '../../../config.php';
include '../../../library/connect.php';
include '../../../model/model_danhmuc.php';
include '../../../library/function.php';

$data = array("name"  => $_POST['name'],
			  "parent_id"  =>$_POST['parent_id']
			  );
$result = "";
them_dm($conn,$data,$result);
echo $result;
