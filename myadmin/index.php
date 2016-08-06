<?php  
include ('connect.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body>
<?php  
if (isset($_GET["p"])) {
	$p = $_GET["p"];
	switch ($p) {
		case 'them-tin-tuc':
			include('module/tintuc/them.php');
			break;
		case 'xoa-tin-tuc':
			include('module/tintuc/xoa.php');
			break;
		case 'sua-tin-tuc':
			include('module/tintuc/sua.php');
			break;
		case 'danh-sach-tin-tuc':
			include('module/tintuc/danhsach.php');
			break;
		case 'them-danh-muc':
			include('module/danhmuc/them.php');
			break;
		case 'xoa-danh-muc':
			include('module/danhmuc/xoa.php');
			break;
		case 'sua-danh-muc':
			include('module/danhmuc/sua.php');
			break;
		case 'danh-sach-danh-muc':
			include('module/danhmuc/danhsach.php');
			break;
		default:
			include('module/dashboard/index.php');
			break;
	}
}else{
		include('module/dashboard/index.php');
	}

?>

</body>
</html>