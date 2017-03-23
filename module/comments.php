<?php
require_once getModulePath('comment/item');
if(isset($_SESSION[SESSION_USER]))
    $myuser = $_SESSION[SESSION_USER];
else
    $myuser = null;
if(isset($data["id"]))
    $news_id = $data["id"];
else
    $news_id = getRePost("news");
?>
<script type="text/javascript" src="js/comment.js"></script>
<p class="title">Bình luận</p>
<?php
if($myuser == null)
{
?>
    <p class="title">Xin vui lòng <a href="#login">đăng nhập</a> hoặc <a href="#register">đăng ký</a> để bình luận.</p>
<?php
} else {
?>
<p class="title">
    <span>Xin chào <?php echo $myuser["user"]; ?></span><br />
    <span hidden class="noti"></span>
    <textarea type="text" name="txtComment"  rows="5"></textarea>
    <input type="button" name="btnComment" value="Gởi bình luận" />
    <span class="counttext">0/200</span>
</p>
<div class="list-comment">
<?php   
}
$list_comments = get_comment_by_newid($conn, $news_id);
foreach ($list_comments as $value)
{
    addCommentItem($value, $myuser);
}
?>
</div>