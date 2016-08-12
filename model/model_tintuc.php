<?php  
// xổ xuống danh sách danh mục &  giữ lại giá trị khi refresh page
function news_cate_data($conn,$selected){
	$stmt = $conn -> prepare("SELECT * FROM category");
	$stmt ->execute();
	$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
	foreach ($data as $val) {
		if ($selected == $val['id']) {
			echo '<option value="'.$val['id'].'" selected>'.$val['name'].'</option>';
		}else{
			echo "<option value=".$val['id'].">".$val['name']."</option>";
		}	
	}
}

function them_tin($conn,$data,&$error){
	$check = $conn ->prepare("SELECT title FROM news where title = :title ");
	$check -> bindParam(':title',$data['title'],PDO::PARAM_STR);
	$check ->execute();
	$count = $check->rowCount();
	if ($count == 0) {
		$stmt = $conn ->prepare("INSERT INTO news(title,author,intro,content,image,status,time_news,category_id) VALUES (:title,:author,:intro,:content,:image,:status,:time_news,:category_id) ");
		$stmt -> bindParam(':title',$data['title'],PDO::PARAM_STR);
		$stmt -> bindParam(':author',$data['author'],PDO::PARAM_STR);
		$stmt -> bindParam(':intro',$data['intro'],PDO::PARAM_STR);
		$stmt -> bindParam(':content',$data['content'],PDO::PARAM_STR);
		$stmt -> bindParam(':image',$data['image'],PDO::PARAM_STR);
		$stmt -> bindParam(':status',$data['status'],PDO::PARAM_INT);
		$stmt -> bindParam(':time_news',$data['time_news'],PDO::PARAM_INT);
		$stmt -> bindParam(':category_id',$data['category_id'],PDO::PARAM_INT);
		$stmt ->execute();
		move_uploaded_file($data['image_tmp'], '../images/tintuc/'.$data['image']);
		redirect('index.php?p=them-tin-tuc');
	}else{
		$error="Dữ liệu này đã tồn tại, vui lòng kiểm tra lại!";
	}
}

function danh_sach_tin_tuc($conn){
	$stmt = $conn ->prepare("SELECT title,name,news.id as nid,author,time_news FROM news INNER JOIN category where news.category_id = category.id order by time_news DESC");
	$stmt ->execute();
	$data = $stmt -> fetchAll(PDO::FETCH_ASSOC);
	return $data;
}

function tin_tuc_can_sua($conn,$id){
  $stmt = $conn->prepare('SELECT * FROM news where id = :id');
  $stmt -> bindParam(':id',$id,PDO::PARAM_INT);
  $stmt -> execute();
  $data = $stmt -> fetch(PDO::FETCH_ASSOC);
  return $data;
}

// Cập nhật 1 tin tức không có hình
function sua_khong_hinh ($conn,$data) {
	$stmt = $conn ->prepare("UPDATE news SET title = :title ,author =:author ,intro =:intro ,content =:content,status = :status ,time_news =:time_news,category_id = :category_id where id =:id");
	$stmt -> bindParam(':title',$data['title'],PDO::PARAM_STR);
	$stmt -> bindParam(':author',$data['author'],PDO::PARAM_STR);
	$stmt -> bindParam(':intro',$data['intro'],PDO::PARAM_STR);
	$stmt -> bindParam(':content',$data['content'],PDO::PARAM_STR);
	$stmt -> bindParam(':status',$data['status'],PDO::PARAM_INT);
	$stmt -> bindParam(':time_news',$data['time_news'],PDO::PARAM_INT);
	$stmt -> bindParam(':category_id',$data['category_id'],PDO::PARAM_INT);
	$stmt -> bindParam(':id',$data['id'],PDO::PARAM_INT);
	$stmt->execute();
	redirect ("index.php?p=danh-sach-tin-tuc");
}
// Cập nhật 1 tin tức có hình
function sua_co_hinh ($conn,$data) {
	$stmt_name_image = $conn->prepare("SELECT image FROM news WHERE id = :id");
	$stmt_name_image->bindParam(':id',$data["id"],PDO::PARAM_INT);
	$stmt_name_image->execute();
	$r = $stmt_name_image->fetch(PDO::FETCH_ASSOC);
	if (file_exists("../images/tintuc/".$r["image"])) {
		unlink("../images/tintuc/".$r["image"]);
	}

	$stmt = $conn->prepare("UPDATE news SET title = :title , author = :author , intro = :intro , content = :content , status = :status , category_id = :category_id,time_news = :time_news , image = :image WHERE id = :id");
	// echo $data["new_image"];
	$stmt->bindParam(':title',$data["title"],PDO::PARAM_STR);
	$stmt->bindParam(':author',$data["author"],PDO::PARAM_STR);
	$stmt->bindParam(':intro',$data["intro"],PDO::PARAM_STR);
	$stmt->bindParam(':content',$data["content"],PDO::PARAM_STR);
	$stmt->bindParam(':image',$data["new_image"],PDO::PARAM_STR);
	$stmt->bindParam(':status',$data["status"],PDO::PARAM_INT);
	$stmt->bindParam(':category_id',$data["category_id"],PDO::PARAM_INT);
	$stmt->bindParam(':time_news',$data["time_news"],PDO::PARAM_INT);
	$stmt->bindParam(':id',$data["id"],PDO::PARAM_INT);
	$stmt->execute();
	move_uploaded_file($data["image_tmp"], '../images/tintuc/'.$data["new_image"]);
	redirect("index.php?p=danh-sach-tin-tuc");
}

//khi xóa thì phải xóa luôn hình trong thư mục.
function news_delete($conn,$id){
	$stmt_name_img =$conn ->prepare("SELECT image from news where id = :id");
	$stmt_name_img->bindParam(":id",$id);
	$stmt_name_img->execute();
	$data = $stmt_name_img->fetch(PDO::FETCH_ASSOC);
	// Nếu hình có tồn tại thì xóa hình,còn không thì vẫn xóa như thường
	if (file_exists("../images/tintuc/".$data["image"])) {
		unlink("../images/tintuc/".$data["image"]);
	}
	// Nếu muốn xóa mà có thể khôi phục được Dl thì ta ko xóa mà cập nhật status = 0, & tại func news_list ta chỉ show ra những tin nào có status = 1(giá trị mặc định).
	$stmt = $conn ->prepare("DELETE from news where id = :id");
	$stmt ->bindParam(":id",$id);
	$stmt ->execute();
	redirect ("index.php?p=danh-sach-tin-tuc");
}
	


//-----------------------------------------------------------------------
function danh_sach_tt_main($conn,&$total=0,$dm=0,$page=1,$search=''){
    $sql='
SELECT      ne.id,ne.title,ne.intro,ne.image,ne.category_id,ca.name
FROM        news ne INNER JOIN category ca ON ne.category_id = ca.id
{WHERE}
ORDER BY    ne.id DESC
LIMIT       :start,:num
';
    $where=$dm>0?'WHERE ne.category_id=:catid':'';
    $where=$where.($search!=''?($dm>0?' AND':'WHERE').' ne.title like :search':'');
    $sql=str_replace('{WHERE}',$where,$sql);
    $stmt=$conn->prepare($sql);
    if($dm>0)
        $stmt->bindParam(":catid",$dm,PDO::PARAM_INT);
    if($search != '')
        $stmt->bindParam(":search",$search="%$search%",PDO::PARAM_STR);
    $stmt->bindValue(":start",(int)($page-1)*NUM_IN_PAGE,PDO::PARAM_INT);
    $stmt->bindValue(":num",(int)NUM_IN_PAGE,PDO::PARAM_INT);
    $stmt->execute();
	$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //Dem sl dong
    $sql='
SELECT  COUNT(*)
FROM    news ne
{WHERE}';
    $sql=str_replace('{WHERE}',$where,$sql);
    $stmt=$conn->prepare($sql);
    if($dm>0)
        $stmt->bindParam(":catid",$dm,PDO::PARAM_INT);
    if($search != '')
        $stmt->bindParam(":search",$search,PDO::PARAM_STR);
    $stmt->execute();
	$total = $stmt->fetchAll(PDO::FETCH_NUM);
    $total=$total[0][0];
    return $data;
}
function chi_tiet_tt($conn,$id){
    $sql='
SELECT  ne.id,ne.title,ne.author,ne.intro,ne.content,ne.image,ne.time_news,ne.category_id,ca.name
FROM    news ne INNER JOIN category ca ON ne.category_id = ca.id
WHERE   ne.id=:id';
    $stmt=$conn->prepare($sql);
    $stmt->bindValue(":id",$id,PDO::PARAM_INT);
    $stmt->execute();
	$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $data;
}
function moi_nhat_tung_cat($conn){
    $sql='
SELECT	ne.id,ne.title,ne.intro,ne.image,ne.category_id,ca.name
FROM	(	SELECT		MAX(id) id,category_id
				FROM			news
				GROUP BY	category_id
				ORDER BY	category_id ASC) te INNER JOIN news ne on te.id=ne.id
					INNER JOIN category ca on te.category_id=ca.id';
    $stmt=$conn->prepare($sql);
    $stmt->execute();
	$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $data;
}

?>