<?php
session_start(); 
include '../../../config.php';
include '../../../library/connect.php';
include '../../../model/model_user.php';
include '../../../library/function.php';
$data = danhsach_user ($conn);
$id = $_SESSION["sys_id"];
$level = $_SESSION["sys_level"];
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

    <tr class="list_data" data-id="<?php echo $item["id"] ?>">
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
        <?php
            if ($item['id'] == $id || $id == 1) {
            $user = "'".$item['user']."'";
            $level = "'".$item['level']."'";
            $pass = "'".$item['pass']."'";
             ?> 
                <a href="javascript:aaa(<?php echo $item['id'].','.$user.','.$level.','.$pass ?>)"><img src="temp/images/edit.png" /></a>
            <?php } ?>
        <?php
        if($id == 1 || ($item['level'] != 1 && $level == 1))
        {
            ?>
                <a href="javascript:delete_user(<?php echo $item['id'] ?>)"><img src="temp/images/delete.png" /></a>
        <?php } ?>
        </td>
    </tr>
    <?php } ?>
</table>