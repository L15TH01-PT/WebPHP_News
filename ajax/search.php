<?php
require '../config.php';
require '../library/mylibs.php';
require '../library/function.php';
require getLibsPath('connect');
require_once getModelPath('model_tintuc');
require_once getModulePath('list/item');

$total=0;
$page=1;
$data=danh_sach_tt_main($conn,$total,getReGet('cat',0),$page,getReGet('q',''));
$return = array();
foreach ($data as $value)
{
	$return[] = $value['title'];
}
echo json_encode($return);