<?php
$data = danhsach_user ($conn);
?>
<link rel="stylesheet" href="temp/templates/css/my_style.css" />

<div id="addForm" style="overflow:hidden;">
    <div id="popupContact">
        <form action="#" id="frmAddUser" method="post" name="form">
            <img id="close" src="../padmin/temp/images/delete-3.png" onclick ="div_hide()">
            <h2 id="name_pop">Thêm User</h2>
            <hr>
            <input id="name" name="txtUser" placeholder="User name" type="text">
            <input id="password" name="txtPass" placeholder="Password" type="password">
            <input id="newPassword" name="txtNewPass" placeholder="New Password" type="password" style="display: block">
            
            <input id="hidden_user_id" name="txtId" type="text" style="display: none">
            <input id="repassword" name="txtRePass" placeholder="Comfirm password" type="password"><br/><br/>
            <h3>Level:</h3>
            <input type="radio" id="A" name="rdoLevel" value="1"> Admin 
            <input type="radio" id="B" name="rdoLevel" value="2" checked="checked"> Member<br/>
            <br/><a href="javascript:add_user()" id="submit">Thêm</a>
        </form>
    </div>
</div>

<div style="text-align: right">
    <button class="user_add1" onclick="div_show()"></button> 
</div>

<div id="user_table">

</div>