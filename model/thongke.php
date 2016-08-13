<?php  
function thongke ($conn,$table) {
	$stmt = $conn->prepare("SELECT COUNT(*) as tong FROM $table");
	$stmt->execute();
	$data = $stmt->fetch(PDO::FETCH_ASSOC);
	return $data;
}

?>