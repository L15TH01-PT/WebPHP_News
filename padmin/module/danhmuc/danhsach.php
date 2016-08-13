<?php 
$data = danh_sach_dm ($conn);

?>
<table class="list_table">
	<tr class="list_heading">
		<td>Danh Mục</td>
		<td class="action_col">Xử lý</td>
	</tr>
    <?php
    $B = 3;
    $stmt = $conn ->prepare("SELECT * FROM category where parent_id =0");
    $stmt->execute();
    $A = $stmt->rowCount();
    $C =ceil($A/$B);
    if (isset($_GET['start'])) {
       $X = $_GET['start'];
    }else{
        $X = 0;
    }
    

    cate_list_data($conn,$X,$B) ?>
</table>
<div align="center">
<?php  
    if ($C > 1) {
        $D = $X/$B + 1;
        if ($D != 1) {
            $Y = $X + $B; 
            echo "<a href='index.php?p=danh-sach-danh-muc&start=$Y'>Prev</a>";
        }
        for ($i=1; $i <= $C ; $i++) {
                $Y = ($i-1)*$B;
            echo "<a href='index.php?p=danh-sach-danh-muc&start=$Y'> $i </a> ";
        }
        if ($D != $C) {
            $Y = $X + $B;
           echo "<a href='index.php?p=danh-sach-danh-muc&start=$Y'>Next</a>";
        }
    }
?>
</div>