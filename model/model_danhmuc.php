<?php  
function them_dm($conn,$data,&$error){
// Kiểm tra thông tin đó có trong DB hay chưa
	$check = $conn->prepare("SELECT name FROM category WHERE name = :name");
	$check->bindParam(':name',$data['name'],PDO::PARAM_STR);
	$check->execute();

	$rowCount = $check->rowCount();
	if ($rowCount == 0) {
		$stmt = $conn->prepare("INSERT INTO category (name,parent_id) VALUES (:name,:parent_id)");
		$stmt->bindParam(":name",$data["name"],PDO::PARAM_STR);
		$stmt->bindParam(":parent_id",$data["parent_id"],PDO::PARAM_INT);
		$stmt->execute();
	}else{
		$error = "Danh mục đã tồn tại";
	}
}

function dm_cha($conn,$parent_id = 0, $str="--|",$selected){
	$stmt = $conn->prepare("SELECT * FROM category WHERE parent_id = :parent_id");
	$stmt -> bindParam("parent_id",$parent_id,PDO::PARAM_INT);
	$stmt ->execute();
	$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
	foreach ($data as $item) {
		// Khi click vào nếu chưa nhập gì thì vẫn dữ lại giá trị danh mục, ko về root.
		if ($item['id'] == $selected) {
			echo '<option value="'.$item['id'].'"selected>'.$str.$item['name'].'</option>';
		}else{
			echo '<option value="'.$item['id'].'">'.$str.$item['name'].'</option>';
		}
		// Gọi đệ Quy
		dm_cha($conn,$item['id'], $str."--| ",$selected);
	}
}

function danh_sach_dm($conn){
	$stmt = $conn->prepare("SELECT * FROM category");
	$stmt->execute();
	$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return $data;
}

function danh_sach_dm_ex($conn){
	$stmt = $conn->prepare("SELECT * FROM category ORDER BY parent_id,id");
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
	$check->bindParam(":name",$data['name'],PDO::PARAM_STR);
	$check->execute();
	$r = $check->rowCount();
	if ($r != 0) {
		$error = "Danh mục đã tồn tại, vui lòng nhập lại!";
	}else{
		$stmt = $conn->prepare("UPDATE category SET name=:name WHERE id = :id");
		$stmt ->bindParam(':name',$data['name'],PDO::PARAM_STR);
		$stmt ->bindParam(':id',$data['id'],PDO::PARAM_INT);
		$stmt->execute();
		redirect("index.php?p=danh-sach-danh-muc");
	}
}

function xoa_dm($conn,$id,&$error = null) {
	$check = $conn->prepare("SELECT * From news inner join category on news.category_id = :id ");
	$check->bindParam(":id",$id);
	$check->execute();
	$r = $check->rowCount();
	$check1 = $conn->prepare("SELECT * from category where parent_id = :id ");
	$check1->bindParam(":id",$id);
	$check1->execute();
	$r1 = $check1->rowCount();
	echo $r.'<br/>';
	echo $r1.'<br/>';
	// if ($r != 0) {
	// 	$error ="không thể xóa danh mục!";
	// }elseif ($r1 != 0) {
	// 	$error ="không thể xóa danh mục!!!";
	// }else{
	// 	// $stmt = $conn->prepare("DELETE FROM category WHERE id = :id");
	// 	// $stmt->bindParam(':id',$id,PDO::PARAM_INT);
	// 	// $stmt->execute();
	// 	// redirect ("index.php?p=danh-sach-danh-muc");
	// 	echo '111';
	// }
}

?>