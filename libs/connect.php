<?php
//require_once('../config.php');

try {
    $conn = new PDO("mysql:host=".HOST.";dbname=".DBNAME,
				     USER,
				     PASS,
				     array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'"));
} catch (Exception $e) {
	echo 'lỗi '. $e;
}
?>
