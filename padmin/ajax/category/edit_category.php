<?php
session_start(); 
include '../../../config.php';
include '../../../library/connect.php';
include '../../../model/model_danhmuc.php';
include '../../../library/function.php';

$id = $_POST["id"];
$name = $_POST["name"];
$parent_id = $_POST["parent_id"];

$data_selected = thong_tin_sua_dm($conn,$id);

$result = "";
sua_dm($conn,$data_selected,$result);
echo $result;

