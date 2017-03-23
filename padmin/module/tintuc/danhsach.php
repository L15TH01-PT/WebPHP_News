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
    $B = 7;
    if (isset($_GET['page'])) {
        $C = $_GET['page'];
    }else{
        $stmt = $conn ->prepare("SELECT * FROM news  ");
        $stmt->execute();
        $A = $stmt->rowCount();
        $C =ceil($A/$B);
    }
    
    if (isset($_GET['start'])) {
       $X = $_GET['start'];
    }else{
        $X = 0;
    }
    
    $data = danh_sach_tin_tuc($conn,$X,$B);
    if (isset($_GET['dem'])) {
        $n = $_GET['start'] + 1;
        $dem = $n;
    }else{
       $dem = 1; 
    }
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
            echo "<a href='index.php?p=danh-sach-tin-tuc&start=0&page=$C'>First&nbsp; </a>";
            $Y = $X - $B; 
            echo "<a href='index.php?p=danh-sach-tin-tuc&dem=$dem&start=$Y&page=$C'>Prev</a>";
        }
        $begin = $D - 2;
        if ($begin < 1) {
           $begin = 1;
        }
        $end = $D + 2;
        if ($end > $C) {
            $end = $C;
        }
        for ($i=$begin; $i <= $end ; $i++) {
            if ($D == $i) {
               echo " <b> $i </b>";
            }else{
                $Y = ($i-1)*$B;
                echo "<a href='index.php?p=danh-sach-tin-tuc&dem=$dem&start=$Y&page=$C'> $i </a>";
            }
           
        }
        if ($D != $C) {
            $Y = $X + $B;
           echo "<a href='index.php?p=danh-sach-tin-tuc&dem=$dem&start=$Y&page=$C'>Next</a>";
           $Y =($C -1) * $B;
           echo "<a href='index.php?p=danh-sach-tin-tuc&dem=$dem&start=$Y&page=$C'> &nbsp;Last</a>";
        }
    }
?>
</div>