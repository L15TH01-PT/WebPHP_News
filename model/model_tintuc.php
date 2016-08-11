<?php
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