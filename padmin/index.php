<?php 
ob_start();
session_start(); 
if (!isset($_SESSION["sys_level"]) || $_SESSION["sys_level"] != 1) {
	session_destroy();
	header("location:login.php");
	exit();
}

include '../config.php';
include '../library/connect.php';
include '../model/model_danhmuc.php';
include '../model/model_tintuc.php';
include '../model/model_user.php';
include '../model/thongke.php';
include '../library/function.php';
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="temp/templates/css/style.css" />
    <!-- Nhúng Ckeditor -->
    <script type="text/javascript" src="../library/ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="../js/jquery-3.1.1.min.js"></script>
	<title>Admin Area :: Trang chính</title>
	<script type="text/javascript">
		function acceptDelete (msg) {
			if (window.confirm(msg)) {
				return true;
			}
			return false;
		}
	</script>
</head>

<body>
<div id="layout">
    <div id="top">
        Admin Area :: Trang chính
    </div>
	<div id="menu">
		<table width="100%">
			<tr>
				<td>
					<a href="index.php">Trang chính</a> | <a href="index.php?p=danh-sach-user">Quản lý user</a> | <a href="index.php?p=danh-sach-danh-muc">Quản lý danh mục</a> | <a href="index.php?p=danh-sach-tin-tuc">Quản lý tin</a> | <a href="index.php?p=them-tin-tuc">Thêm Tin</a> | <a href="index.php?p=them-danh-muc">Thêm Danh mục</a> | <a href="index.php?p=them-user">Thêm User</a>
				</td>
				<td align="right">
					Xin chào <?php echo $_SESSION["sys_user"] ?> | <a href="logout.php">Logout</a>
				</td>
			</tr>
		</table>
	</div>
    <div id="main">
		<?php 
		if (isset($_GET["p"])) {
			$p = $_GET["p"];
			switch ($p) {
				case 'them-danh-muc':
					include 'module/danhmuc/them.php';
					break;
				case 'sua-danh-muc':
					include 'module/danhmuc/sua.php';
					break;
				case 'xoa-danh-muc':
					include 'module/danhmuc/xoa.php';
					break;
				case 'danh-sach-danh-muc':
					include 'module/danhmuc/danhsach.php';
					break;
				case 'them-tin-tuc':
					include 'module/tintuc/them.php';
					break;
				case 'xoa-tin-tuc':
					include 'module/tintuc/xoa.php';
					break;
				case 'sua-tin-tuc':
					include 'module/tintuc/sua.php';
					break;
				case 'danh-sach-tin-tuc':
					include 'module/tintuc/danhsach.php';
					break;
				case 'them-user':
					include 'module/user/them.php';
					break;
				case 'xoa-user':
					include 'module/user/xoa.php';
					break;
				case 'sua-user':
					include 'module/user/sua.php';
					break;
				case 'danh-sach-user':
					include 'module/user/danhsach.php';
					break;
				default:
					include 'module/dashboard/index.php';
					break;
			}
		} else {
			include 'module/dashboard/index.php';
		}
		?>    
	</div>
    <div id="bottom">
        PhongTran - LT51500122
    </div>
</div>
</body>
</html>