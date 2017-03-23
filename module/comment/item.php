<?php
function addCommentItem($data, $myuser)
{
?>
    <div class="comment-item">
        <?php
            if($myuser != null)
            {
                if($data["user_id"] == $myuser["id"] || ($myuser["level"] == 1 /*&& $data["level"] != 1*/)){
        ?>
            <div class="comment-delete"><a href="#" data-id="<?php echo $data["id"]; ?>">Xóa bình luận</a></div>
        <?php
                }
            }
        ?>
        <div class="comment-user"><?php echo $data['user']; ?></div>
        <div class="comment-day"><?php echo $data['date_create']; ?></div>
        <div><?php echo NL2br(strip_tags($data['content'])); ?></div>
    </div>
<?php
}