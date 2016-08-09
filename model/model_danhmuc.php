<?php  
function them_dm($conn,$val,&$error){
	$check = $conn->prepare("SELECT * from category where name =:name");
	$check->bindParam(':name',$val,PDO::PARAM_STR);
	$check->execute();
	$r = $check->rowCount();
	if ($r != 0) {
		$error = "Tên danh mục đã tồn tại, vui lòng nhập lại!";
	}else{
		$stmt = $conn ->prepare("INSERT INTO category(name) values(:name)");
		$stmt->bindParam(":name",$val,PDO::PARAM_STR);
		$stmt->execute();
		redirect("index.php?p=danh-sach-danh-muc");
	}
}

function danh_sach_dm($conn){
	$stmt = $conn->prepare("SELECT * FROM category");
	$stmt->execute();
	$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return $data;
}

function thong_tin_sua_dm($conn,$id){
	$stmt = $conn ->prepare("SELECT * From category where id = :id");
	$stmt->bindParam(":id",$id,PDO::PARAM_INT);
	$stmt->execute();
	$data = $stmt->fetch(PDO::FETCH_ASSOC);
	return $data;
}

function sua_dm($conn,$data,&$error){
	$check = $conn->prepare("SELECT * from category where name =:name");
	$check->bindParam(":name",$data['name'],PDO::PARAM_INT);
	$check->execute();
	$r = $check->rowCount();
	if ($r != 0) {
		$error = "Tên danh mục đã tồn tại, vui lòng nhập lại!";
	}else{
		$stmt = $conn->prepare("UPDATE category set name =:name where id = :id");
		$stmt->bindParam(":id",$data['id'],PDO::PARAM_INT);
		$stmt->bindParam(":name",$data['name'],PDO::PARAM_STR);
		$stmt->execute();
		redirect("index.php?p=danh-sach-danh-muc");
	}
}

function xoa_dm($conn,$val){
	$v = 0;
	$check = $conn->prepare("SELECT * From news inner join category on news.category_id = :id ");
	$check->bindParam(":id",$id);
	$check->execute();
	$r = $check->rowCount();
	if ($r != 0) {
		$v = 0;
	}else{
		$v = 1;
		$stmt = $conn->prepare("DELETE FROM category WHERE id = :id");
		$stmt->bindParam(':id',$id,PDO::PARAM_INT);
		$stmt->execute();
		redirect ("index.php?p=danh-sach-danh-muc");
	}
	return $v;
}

?>