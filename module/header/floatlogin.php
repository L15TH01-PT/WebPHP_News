<script type="text/javascript" src="js/login.js"></script>
<?php
if(!isset($_SESSION[SESSION_USER]) || isset($_SESSION[SESSION_USER]) == null)
{
?>
    <a href="#">Đăng nhập</a>
    <div class="dropdown-content" style="right: 0;">
        <div id="floatlogin">
	        <ul>
		        <li><a href="#login">Đăng nhập</a></li>
		        <li><a href="#register">Đăng ký</a></li>
	        </ul>
	        <div id="login">
		        <form action="" method="post" id="frmLogin">
			        <table>
				        <tr>
					        <td colspan="2"><span class="noti"></span></td>
				        </tr>
				        <tr>
					        <td>Tên đăng nhập (Email)</td>
					        <td><input type="email" name="username" /></td>
				        </tr>
				        <tr>
					        <td>Mật khẩu</td>
					        <td><input type="password" name="password" /></td>
				        </tr>
				        <tr>
					        <td colspan="2"><input type="button" name="login" value="Đăng nhập" style="float: right;" /></td>
				        </tr>
			        </table>
		        </form>
	        </div>
	        <div id="register">
		        <form action="" method="post" id="frmRegister">
			        <table>
				        <tr>
					        <td colspan="2"><span class="noti"></span></td>
				        </tr>
				        <tr>
					        <td>Email</td>
					        <td><input type="email" name="username" /></td>
				        </tr>
				        <tr>
					        <td>Mật khẩu</td>
					        <td><input type="password" name="password" /></td>
				        </tr>
				        <tr>
					        <td>Lặp lại mật khẩu</td>
					        <td><input type="password" name="repassword" /></td>
				        </tr>
				        <tr>
					        <td colspan="2"><input type="button" name="register" value="Đăng ký" style="float: right;" /></td>
				        </tr>
			        </table>
		        </form>
	        </div>
        </div>
    </div>
<?php
} else {
    $myuser = $_SESSION[SESSION_USER];
?>
    <a href="#">Tài khoản</a>
    <div class="dropdown-content" style="right: 0;">
        <div id="floatlogin">
	        <ul>
		        <li><a href="#logout">Đăng xuất</a></li>
		        <li><a href="#changepass">Đổi mật khẩu</a></li>
	        </ul>
	        <div id="logout" style="text-align: center; padding: 20px; color: #fff">
	            <p style="color: #000;">Chào mừng <?php echo $myuser["user"]; ?></p>
	            <div style="margin: 20px;"><input type="button" name="btnLogout" value="Đăng xuất" style="padding: 10px;" /></div>
	        </div>
	        <div id="changepass">
		        <form action="" method="post" id="frmChangepass">
			        <table>
				        <tr>
					        <td colspan="2"><span class="noti"></span></td>
				        </tr>
				        <tr>
					        <td>Mật khẩu cũ</td>
					        <td><input type="password" name="oldpassword" /></td>
				        </tr>
				        <tr>
					        <td>Mật khẩu mới</td>
					        <td><input type="password" name="password" /></td>
				        </tr>
				        <tr>
					        <td>Lặp lại mật khẩu</td>
					        <td><input type="password" name="repassword" /></td>
				        </tr>
				        <tr>
					        <td colspan="2"><input type="button" name="changepass" value="Đổi mật khẩu" style="float: right;" /></td>
				        </tr>
			        </table>
		        </form>
	        </div>
        </div>
    </div>
<?php
}