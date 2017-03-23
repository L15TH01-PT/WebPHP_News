<?php
session_start(); 
include '../../../config.php';
include '../../../library/connect.php';
include '../../../model/model_danhmuc.php';
include '../../../library/function.php';

$id = $_POST["id"];
$result = "";
xoa_dm($conn,$id,$result);
echo $result;