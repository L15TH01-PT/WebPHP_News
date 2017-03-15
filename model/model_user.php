<?php 
function them_user($conn,$data,&$error){
	$check = $conn->prepare("SELECT user FROM user WHERE user = :user");
	$check->bindParam(':user',$data['user'],PDO::PARAM_STR);
	$check->execute();

	$rowCount = $check->rowCount();
	if ($rowCount == 0) {
		$stmt = $conn->prepare("INSERT INTO user (user,pass,level) VALUES (:user,:pass,:level)");
		$stmt->bindParam(":user",$data["user"],PDO::PARAM_STR);
		$stmt->bindParam(":pass",$data["pass"],PDO::PARAM_STR);
		$stmt->bindParam(":level",$data["level"],PDO::PARAM_INT);
		$stmt->execute();
		$error = "1";
		//redirect("index.php?p=danh-sach-user");
	}else{
		$error = "0";
	}
}

function login ($conn,$data,&$error) {
	$check = $conn->prepare("SELECT * FROM user WHERE user = :user AND pass = :pass");
	$check->bindParam(':user',$data["user"],PDO::PARAM_STR);
	$check->bindParam(':pass',$data["pass"],PDO::PARAM_STR);
	$check->execute();
	$count = $check->rowCount();
	if ($count == 0) {
		$error = "Tài Khoản Không Tồn Tại, Vui lòng Kiểm Tra lại";
	}else{
		$error = "ok";
		$data_login = $check->fetch(PDO::FETCH_ASSOC);
		$_SESSION["sys_id"] = $data_login["id"];
		$_SESSION["sys_user"] = $data_login["user"];
		$_SESSION["sys_level"] = $data_login["level"];
		header("location:index.php");
		exit();
	}
}

function danhsach_user ($conn) {
	$stmt = $conn->prepare("SELECT * FROM user ORDER BY id DESC");
	$stmt->execute();
	$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return $data;
}

function user_edit_data ($conn,$id) {
	$stmt = $conn->prepare("SELECT * FROM user WHERE id = :id");
	$stmt->bindParam(':id',$id,PDO::PARAM_INT);
	$stmt->execute();
	$data = $stmt->fetch(PDO::FETCH_ASSOC);
	return $data;
}

function user_edit ($conn,$data) {
	$stmt = $conn->prepare("UPDATE user SET pass = :pass , level = :level WHERE id = :id");
	$stmt->bindParam(':pass',$data["pass"],PDO::PARAM_STR);
	$stmt->bindParam(':level',$data["level"],PDO::PARAM_STR);
	$stmt->bindParam(':id',$data["id"],PDO::PARAM_STR);
	$stmt->execute();
	redirect("index.php?p=danh-sach-user");
}

function user_delete ($conn,$id) {
	$stmt = $conn->prepare("DELETE FROM user WHERE id = :id");
	$stmt->bindParam(':id',$id,PDO::PARAM_INT);
	$stmt->execute();
	// redirect ("index.php?p=danh-sach-user");
}


?>