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
    $B = 3;
    $stmt = $conn ->prepare("SELECT * FROM news  ");
    $stmt->execute();
    $A = $stmt->rowCount();
    $C =ceil($A/$B);
    if (isset($_GET['start'])) {
       $X = $_GET['start'];
    }else{
        $X = 0;
    }
    $dem = 1;
    $data = danh_sach_tin_tuc($conn,$X,$B);
    
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

<div align="center">
<?php  
    if ($C > 1) {
        $D = $X/$B + 1;
        if ($D != 1) {
            $Y = $X - $B; 
            echo "<a href='index.php?p=danh-sach-tin-tuc&dem=$dem&start=$Y'>Prev</a>";
        }
        for ($i=1; $i <= $C ; $i++) {
            if ($D == $i) {
               echo " <b> $i</b> ";
            }else{
                $Y = ($i-1)*$B;
                echo "<a href='index.php?p=danh-sach-tin-tuc&dem=$dem&start=$Y'> $i </a> ";
            }
           
        }
        if ($D != $C) {
            $Y = $X + $B;
           echo "<a href='index.php?p=danh-sach-tin-tuc&dem=$dem&start=$Y'>Next</a>";
        }
    }
?>
</div>