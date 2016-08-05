<?php  
$stmt = $conn ->prepare("SELECT * FROM category");
$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>


<table width="300px" align='center' border='1px'>
	<tr>
		<td width='60px'>STT</td>
		<td>name</td>
		<td>Edit</td>
		<td>Delete</td>
	</tr>
	<?php $dem = 0;
	foreach ($data as $val) {
	$dem += 1;
	?>
	<tr>
		<td> <?php echo $dem; ?> </td>
		<td><?php echo $val['name']; ?></td>
		<td> <a href="index.php?p=sua-danh-muc&id=<?php echo $val["id"] ?>"> Edit</a></td>
		<td><a href="index.php?p=xoa-danh-muc&id=<?php echo $val["id"] ?>"> Delete</a></td>	
	</tr>
	<?php } ?>
</table>
