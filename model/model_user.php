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
		return $error = "1";
		//redirect("index.php?p=danh-sach-user");
	}else{
		return $error = "0";
	}
}

function login ($conn,$data,&$error) {
	$check = $conn->prepare("SELECT * FROM user WHERE user = :user AND pass = :pass");
	$check->bindParam(':user',$data["user"],PDO::PARAM_STR);
	$check->bindParam(':pass',$data["pass"],PDO::PARAM_STR);
	$check->execute();
	$count = $check->rowCount();
	if ($count == 0) {
		$error = "Thông tin sai, Vui lòng Kiểm Tra lại";
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
	$stmt = $conn->prepare("SELECT * FROM user ORDER BY level ASC");
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
	// $row = $stmt->fetch();
	// return $row;
	// redirect("index.php?p=danh-sach-user");
}

function user_edit1 ($conn,$data) {
	$stmt = $conn->prepare("UPDATE user SET pass = :newPass , level = :level WHERE id = :id AND pass = :oldPass");
	$stmt->bindParam(':newPass',$data["newPass"],PDO::PARAM_STR);
	$stmt->bindParam(':level',$data["level"],PDO::PARAM_STR);
	$stmt->bindParam(':id',$data["id"],PDO::PARAM_STR);
	$stmt->bindParam(':oldPass',$data["oldPass"],PDO::PARAM_STR);
	$stmt->execute();

	$count = $stmt->rowCount();
	return $count;
}

function user_delete ($conn,$id) {
	$stmt = $conn->prepare("DELETE FROM user WHERE id = :id");
	$stmt->bindParam(':id',$id,PDO::PARAM_INT);
	$stmt->execute();
	
	// redirect ("index.php?p=danh-sach-user");
}

/*-----------------------------------------------------------------------*/

function web_check_user($conn, $user){
	$check = $conn->prepare("SELECT * FROM user WHERE user = :user");
	$check->bindParam(':user', $user, PDO::PARAM_STR);
	$check->execute();

	$rowCount = $check->rowCount();
    if($rowCount > 0)
        return 1;
    return 0;
}

function web_get_user($conn, $user){
	$stmt = $conn->prepare("SELECT * FROM user WHERE user = :user");
	$stmt->bindParam(':user', $user, PDO::PARAM_STR);
	$stmt->execute();
	$data = $stmt->fetch(PDO::FETCH_ASSOC);
	return $data;
}

function web_them_user($conn, $data){
    if(web_check_user($conn, $data["user"]) == 1)
        return -1;

    $data["level"] = 2;
    $stmt = $conn->prepare("INSERT INTO user (user,pass,level) VALUES (:user,:pass,:level)");
    $stmt->bindParam(":user",$data["user"],PDO::PARAM_STR);
    $stmt->bindParam(":pass",$data["pass"],PDO::PARAM_STR);
    $stmt->bindParam(":level",$data["level"],PDO::PARAM_INT);
    $stmt->execute();
    $rowCount = $stmt->rowCount();
    if($rowCount > 0)
    {
        return web_login($conn, $data);
    }
    return 0;
}

function web_login ($conn,$data) {
	$check = $conn->prepare("SELECT * FROM user WHERE user = :user AND pass = :pass");
	$check->bindParam(':user',$data["user"],PDO::PARAM_STR);
	$check->bindParam(':pass',$data["pass"],PDO::PARAM_STR);
	$check->execute();
	
    $count = $check->rowCount();
	if ($count == 0) {
        return 0;
    }

	$data_login = $check->fetch(PDO::FETCH_ASSOC);
    $_SESSION[SESSION_USER] = $data_login;
    return 1;
}

function web_check_login ($conn,$data) {
	$check = $conn->prepare("SELECT * FROM user WHERE user = :user AND pass = :pass");
	$check->bindParam(':user',$data["user"],PDO::PARAM_STR);
	$check->bindParam(':pass',$data["pass"],PDO::PARAM_STR);
	$check->execute();
	
	$rowCount = $check->rowCount();
    if($rowCount > 0)
        return 1;
    return 0;
}

function web_check_login2 ($conn) {
	if(!isset($_SESSION[SESSION_USER]))
		return 0;
	$data = $_SESSION[SESSION_USER];
	$check = $conn->prepare("SELECT * FROM user WHERE user = :user AND pass = :pass");
	$check->bindParam(':user',$data["user"],PDO::PARAM_STR);
	$check->bindParam(':pass',$data["pass"],PDO::PARAM_STR);
	$check->execute();
	
	$rowCount = $check->rowCount();
    if($rowCount > 0)
        return 1;
    return 0;
}

function web_change_pass ($conn, $data) {
	if(!isset($_SESSION[SESSION_USER]))
		return 0;
	$curuser = $_SESSION[SESSION_USER];
	$check = $conn->prepare("UPDATE user SET pass = :pass WHERE user = :user AND pass = :oldpass");
	$check->bindParam(':user',$curuser["user"],PDO::PARAM_STR);
	$check->bindParam(':pass',$data["pass"],PDO::PARAM_STR);
	$check->bindParam(':oldpass',$curuser["pass"],PDO::PARAM_STR);
	$check->execute();
	
	$rowCount = $check->rowCount();
    if($rowCount == 0)
        return 0;
    $_SESSION[SESSION_USER] = web_get_user($conn, $curuser["user"]);
    return 1;
}

function web_logout () {
    unset($_SESSION[SESSION_USER]);
    if(!isset($_SESSION[SESSION_USER]))
        return 1;
    return 0;
}