<?php 
$data = danh_sach_dm ($conn);

?>
<link rel="stylesheet" href="temp/templates/css/my_style.css" />

<div id="addCateForm" style="overflow:hidden;">
    <div id="popupCategory">
        <form action="#" id="frmAddCategory" method="POST" name="form">
            <img id="close" src="../padmin/temp/images/delete-3.png" onclick ="div_hide_category()">
            <h2 id="pop_name">Thêm danh mục</h2>
            <hr>
            <span class="form_label">Danh mục cha:</span><br><br>
                <span class="form_item">
                    <select name="sltCate" id="sltCate" class="select">
                        <option value="0">--- ROOT ---</option>
                        <!-- Giữ lại danh mục khi nhấn button nhưng ko nhập gì -> báo lỗi -->
                        <?php dm_cha($conn,$parent_id = 0, $str="--|",$_POST["sltCate"]); ?>
                    </select>
            </span><br /> 
            <input id="parent" type="text" style="display: block"> <br>
            <input id="txtTenDM" name="txtTenDM" placeholder="Tên danh mục" type="text"> <br>
            <br/><a href="javascript:add_category()" id="submit">Thêm</a>
        </form>
    </div>
</div>

<div style="text-align: right">
    <button class="category_add" onclick="div_show_category()"></button> 
</div>

<div id="category_table">

</div>
<div align="center">
