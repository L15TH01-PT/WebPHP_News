<?php
require_once getLibsPath('connect');

function query($sql, $arr = array(), $mode = PDO::FETCH_ASSOC)
{
    global $conn;
	$stm = $conn->prepare($sql);
	if (!$stm->execute( $arr))
	{
	echo "Sql l?i."; exit;
	}
	return $stm->fetchAll($mode);
}
?>