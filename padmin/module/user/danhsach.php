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
<link rel="stylesheet" href="temp/templates/css/my_style.css" />
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

<div id="addForm" style="overflow:hidden;">
<!-- Popup Div Starts Here -->
<div id="popupContact">
<!-- Contact Us Form -->
<form action="#" id="frmAddUser" method="post" name="form">
<img id="close" src="../padmin/temp/images/delete-3.png" onclick ="div_hide()">
<h2>Thêm User</h2>
<hr>
<input id="name" name="txtUser" placeholder="User name" type="text">
<input id="password" name="txtPass" placeholder="Password" type="password">
<input id="repassword" name="txtRePass" placeholder="Comfirm password" type="password"><br/><br/>
<h3>Level:</h3> <input type="radio" name="rdoLevel" value="1"> Admin 
       <input type="radio" name="rdoLevel" value="2" checked="checked"> Member<br/>
<br/><a href="javascript:add_user()" id="submit">Thêm</a>
</form>
</div>
<!-- Popup Div Ends Here -->
</div>

<div style="text-align: right;">
    <button class="user_add1" id="popup" onclick="div_show()"></button> 
</div>

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