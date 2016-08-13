<?php 
$data = danh_sach_dm ($conn);

?>
<table class="list_table">
	<tr class="list_heading">
		<td>Danh Mục</td>
		<td class="action_col">Xử lý</td>
	</tr>
    <?php 
    cate_list_data($conn) ?>
</table>
<div align="center">
