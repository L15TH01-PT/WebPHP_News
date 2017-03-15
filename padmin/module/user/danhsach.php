<!-- <?php 
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
</table> -->


<?php

$data = danhsach_user ($conn);
?>
<script type="text/javascript">
    function abc(userId){
        if(acceptDelete ('Bạn có chắc muốn xóa thành viên này hay không ??')){
            $.ajax({
            type:"GET",
            url:"ajax/delete_user.php",
            data:{userid:userId},
            success: function(data)
            {
                if(data == 1){
                    alert("Xoa thanh cong");
                    $.ajax({
                        type:"GET",
                        url:"ajax/delete_user.php",
                        // data:{userid:userId},
                        success: function(data)
                        {
                            #().html()
                            if(data == 1){
                                alert("Xoa thanh cong");
                            }else{
                                alert ("Xoa that bai");
                            }
                        }
                }else{
                    alert ("Xoa that bai");
                }
            }
        });
        }
        
    }
</script>
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
            <a onclick="abc ('<?php echo $item["id"] ?>')" href="#"><img src="temp/images/delete.png" /></a>
        </td>
    </tr>
    <?php } ?>
</table>