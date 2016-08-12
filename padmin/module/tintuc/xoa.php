<?php  
if (isset($_GET['ttid'])) {
	$id = $_GET['ttid'];
	news_delete($conn,$id);
}else{
	redirect("index.php?p=danh-sach-tin-tuc");
}
?>