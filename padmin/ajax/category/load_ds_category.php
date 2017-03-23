<?php
session_start(); 
include '../../../config.php';
include '../../../library/connect.php';
include '../../../model/model_danhmuc.php';
include '../../../library/function.php';
$data = danh_sach_dm ($conn);
$id = $_SESSION["sys_id"];
$level = $_SESSION["sys_level"];
?>

<table class="list_table">
	<tr class="list_heading">
		<td>Danh Mục</td>
		<td class="action_col">Xử lý</td>
	</tr>
    <?php 
    cate_list_data($conn) ?>
</table>