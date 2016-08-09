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
					<a href="index.php">Trang chính</a> | <a href="index.php?p=danh-sach-nguoi-dung">Quản lý user</a> | <a href="index.php?p=danh-sach-danh-muc">Quản lý danh mục</a> | <a href="index.php?p=danh-sach-tin-tuc">Quản lý tin</a>
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
				case 'trang-chu':
					include 'module/dashboard/index.php';
					break;
				case 'them-danh-muc':
					include 'module/cate/add.php';
					break;
				case 'sua-danh-muc':
					include 'module/cate/edit.php';
					break;
				case 'xoa-danh-muc':
					include 'module/cate/delete.php';
					break;
				case 'danh-sach-danh-muc':
					include 'module/cate/list.php';
					break;
				case 'them-tin-tuc':
					include 'module/news/add.php';
					break;
				case 'xoa-tin-tuc':
					include 'module/news/delete.php';
					break;
				case 'sua-tin-tuc':
					include 'module/news/edit.php';
					break;
				case 'danh-sach-tin-tuc':
					include 'module/news/list.php';
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