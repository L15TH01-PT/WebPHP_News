<?php 
$data = danh_sach_dm ($conn);
?>
<table class="list_table">
	<tr class="list_heading">
		<td class="id_col">STT</td>
		<td>Danh Mục</td>
		<td class="action_col">Xử lý</td>
	</tr>

    <?php 
    $stt = 0;
    foreach ($data as $val) {
        $stt = $stt + 1;
    ?>
	<tr class="list_data">
        <td class="aligncenter"><?php echo $stt; ?></td>
        <td class="list_td alignleft"><?php echo $val["name"] ?></td>
        <td class="list_td aligncenter">
            <a href="index.php?p=sua-danh-muc&dmid=<?php echo $val["id"] ?>"><img src="temp/images/edit.png" /></a>&nbsp;&nbsp;&nbsp;
            <a onclick="return acceptDelete ('Xác nhận xóa danh mục này?')" href="index.php?p=xoa-danh-muc&dmid=<?php echo $val["id"] ?>"><img src="temp/images/delete.png" /></a>
        </td>
    </tr>
    <?php } ?>

</table>