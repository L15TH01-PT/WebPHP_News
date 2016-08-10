<?php
function danh_sach_tt_main($conn,$page=1,$dm=0){
    $sql='
SELECT      ne.id,ne.title,ne.intro,ne.image,ne.category_id,ca.name
FROM        news ne INNER JOIN category ca ON ne.category_id = ca.id
{WHERE}
ORDER BY    ne.id DESC
LIMIT       :start,:num';
    $sql=str_replace('{WHERE}',$dm>0?'WHERE ne.category_id=:catid':'',$sql);
    $stmt=$conn->prepare($sql);
    if($dm>0)
        $stmt->bindParam(":catid",$dm,PDO::PARAM_INT);
    $stmt->bindValue(":start",(int)($page-1)*NUM_IN_PAGE,PDO::PARAM_INT);
    $stmt->bindValue(":num",(int)NUM_IN_PAGE,PDO::PARAM_INT);
    $stmt->execute();
	$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
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