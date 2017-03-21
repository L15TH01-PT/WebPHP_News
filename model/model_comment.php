<?php
function get_comment_by_id($conn, $id){
    $sql='
SELECT	c.*, u.user, u.level
FROM    comment c INNER JOIN user u ON c.user_id = u.id
WHERE   c.id = :id';
    $stmt=$conn->prepare($sql);
    $stmt->bindParam(":id", $id,PDO::PARAM_INT);
    $stmt->execute();
	$data = $stmt->fetch(PDO::FETCH_ASSOC);
	return $data;
}
function get_comment_by_newid($conn, $newID){
    $sql='
SELECT	c.*, u.user, u.level
FROM    comment c INNER JOIN user u ON c.user_id = u.id
WHERE   news_id = :newID
ORDER BY    date_create DESC';
    $stmt=$conn->prepare($sql);
    $stmt->bindParam(":newID", $newID,PDO::PARAM_INT);
    $stmt->execute();
	$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $data;
}

function add_comment($conn, $data){
    $stmt = $conn->prepare("INSERT INTO comment (news_id,user_id,content) VALUES (:news_id,:user_id,:content)");
    $stmt->bindParam(":news_id",$data["news_id"],PDO::PARAM_INT);
    $stmt->bindParam(":user_id",$data["user_id"],PDO::PARAM_INT);
    $stmt->bindParam(":content",$data["content"],PDO::PARAM_STR);
    $stmt->execute();
    $rowCount = $stmt->rowCount();
    if($rowCount > 0)
    {
        //return 1;
        $id = $conn->lastInsertId();
        return get_comment_by_id($conn, $id);
    }
    return null;
}

function delete_comment($conn, $id){
    $stmt = $conn->prepare("DELETE FROM comment WHERE id = :id");
    $stmt->bindParam(":id",$id,PDO::PARAM_INT);
    $stmt->execute();
    $rowCount = $stmt->rowCount();
    if($rowCount > 0)
    {
        return 1;
    }
    return 0;
}
