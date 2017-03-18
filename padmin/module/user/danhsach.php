
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
                if(data == "1"){
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
    <div id="popupContact">
        <form action="#" id="frmAddUser" method="post" name="form">
            <img id="close" src="../padmin/temp/images/delete-3.png" onclick ="div_hide()">
            <h2>Thêm User</h2>
            <hr>
            <input id="name" name="txtUser" placeholder="User name" type="text">
            <input id="password" name="txtPass" placeholder="Password" type="password">
            <input id="repassword" name="txtRePass" placeholder="Comfirm password" type="password"><br/><br/>
            <h3>Level:</h3>
            <input type="radio" name="rdoLevel" value="1"> Admin 
            <input type="radio" name="rdoLevel" value="2" checked="checked"> Member<br/>
            <br/><a href="javascript:add_user()" id="submit">Thêm</a>
        </form>
    </div>
</div>

<div style="text-align: right">
    <button class="user_add1" onclick="div_show()"></button> 
</div>

<div id="user_table">

</div>