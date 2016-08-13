<?php 
$data = danhsach_user ($conn);
?>
<table class="list_table">
    <tr class="list_heading">
        <td class="id_col">STT</td>
        <td>Username</td>
        <td>Level</td>
        <td class="action_col">Xử lý?</td>
    </tr>
    <?php 
    $stt = 0;
    foreach ($data as $item) { 
        $stt = $stt + 1;
    ?>
    <tr class="list_data">
        <td class="aligncenter"><?php echo $stt; ?></td>
        <td class="list_td aligncenter"><?php echo $item["user"] ?></td>
        <td class="list_td aligncenter">
            <?php 
            if ($item["id"] == 1) {
                echo '<span style="color: red; font-weight: bold;">Super Admin</span>';
            } elseif ($item["level"] == 1) {
                echo '<span style="color: blue; font-weight: bold;">Admin</span>';
            } else {
                echo '<span style="color: black;">Member</span>';
            }

            ?>
        </td>
        <td class="list_td aligncenter">
            <a href="index.php?p=sua-user&userid=<?php echo $item["id"] ?>"><img src="temp/images/edit.png" /></a>&nbsp;&nbsp;&nbsp;
            <a onclick="return acceptDelete ('Bạn có chắc muốn xóa thành viên này hay không ??')" href="index.php?p=xoa-user&userid=<?php echo $item["id"] ?>"><img src="temp/images/delete.png" /></a>
        </td>
    </tr>
    <?php } ?>
    <!-- <tr class="list_data">
        <td class="aligncenter">2</td>
        <td class="list_td aligncenter">Vũ Quốc Tuấn</td>
        <td class="list_td aligncenter"><span style="color: blue; font-weight: bold;">Admin</span></td>
        <td class="list_td aligncenter">
            <a href=""><img src="images/edit.png" /></a>&nbsp;&nbsp;&nbsp;
            <a href=""><img src="images/delete.png" /></a>
        </td>
    </tr>
    <tr class="list_data">
        <td class="aligncenter">3</td>
        <td class="list_td aligncenter">Vũ Quốc Tuấn</td>
        <td class="list_td aligncenter"><span style="color: black;">Member</span></td>
        <td class="list_td aligncenter">
            <a href=""><img src="images/edit.png" /></a>&nbsp;&nbsp;&nbsp;
            <a href=""><img src="images/delete.png" /></a>
        </td>
    </tr> -->
</table>