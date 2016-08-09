<?php 
include '../config.php';
include '../library/connect.php';
include '../model/model_danhmuc.php';
include '../model/model_tintuc.php';
include '../model/model_user.php';
include '../library/function.php';
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="QuocTuan.Info" />
    <link rel="stylesheet" href="temp/templates/css/style.css" />
    <!-- Nhúng Ckeditor -->
    <script type="text/javascript" src="../library/ckeditor/ckeditor.js"></script>
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
					<a href="index.php">Trang chính</a> | <a href="index.php?p=danh-sach-user">Quản lý user</a> | <a href="index.php?p=danh-sach-danh-muc">Quản lý danh mục</a> | <a href="index.php?p=danh-sach-tin-tuc">Quản lý tin</a>
				</td>
				<td align="right">
					Xin chào admin | <a href="logout.php">Logout</a>
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
					include 'module/tintuc/them.php';
					break;
				case 'xoa-user':
					include 'module/tintuc/xoa.php';
					break;
				case 'sua-user':
					include 'module/tintuc/sua.php';
					break;
				case 'quan-ly-user':
					include 'module/tintuc/danhsach.php';
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
        Copyright © 2016 by PhongTran 
    </div>
</div>
</body>
</html>