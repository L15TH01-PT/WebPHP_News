<?php  
    $data = danh_sach_tin_tuc($conn);
?>
<table class="list_table">
	<tr class="list_heading">
		<td class="id_col">STT</td>
		<td>Tiêu Đề</td>
        <td>Thể loại</td>
		<td>Tác Giả</td>
		<td>Thời Gian</td>
		<td class="action_col">Xử lý?</td>
	</tr>
    <?php
    $dem = 1;
    foreach ($data as $val) { ?>
	<tr class="list_data">
        <td class="aligncenter"> <?php echo $dem; ?> </td>
        <td class="list_td aligncenter"> <?php echo $val['title'] ?> </td>
        <td class="list_td aligncenter"> <?php echo $val['name'] ?> </td>
        <td class="list_td aligncenter"> <?php echo $val['author'] ?> </td>
		<td class="list_td aligncenter"> <?php echo time_elapsed_string($val['time_news']) ?> </td>
        <td class="list_td aligncenter">
            <a href="index.php?p=sua-tin-tuc&ttid=<?php echo $val['nid']; ?>"><img src="temp/images/edit.png" /></a>&nbsp;&nbsp;&nbsp;
            <a onclick="return acceptDelete('Xác nhận xóa xóa tin?')" href="index.php?p=xoa-tin-tuc&ttid=<?php echo $val['nid']; ?>"><img src="temp/images/delete.png" /></a>
        </td>
    </tr>
	<?php $dem += 1; } ?>
</table>
	