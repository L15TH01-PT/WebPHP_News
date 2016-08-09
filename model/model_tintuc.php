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
?>