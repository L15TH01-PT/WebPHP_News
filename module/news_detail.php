<?php
require_once getModelPath('model_tintuc');
require_once getModelPath("model_comment");
$data=chi_tiet_tt($conn,getReGet('news',0));
if(count($data) == 0)
{
    echo "<h1>Tin tức không tồn tại.<h1>";
}
else
{
    $data=$data[0];
?>
<div class="new-contents-item" data-id="<?php echo $data['id']; ?>">
    <div class="new-contents-item-category">
        <div class="new-contents-item-category-bg">
            <p class="new-contents-item-category-text">
                <a href="<?php echo getMyLink(array('cat'=>$data['category_id'])); ?>">
                    <?php echo $data['name']; ?>
                </a>
            </p>
        </div>
    </div>
    <div class="new-contents-item-contents">
        <p class="news_day"><?php echo convert_time($data['time_news']);?></p>
        <h2 class="news_title">
            <a href="<?php echo getMyLink(array('ac'=>'news','news'=>$data['id'])); ?>"><?php echo $data['title'];?></a>
        </h2>
        <p class="news_pic">
            <img alt="<?php echo $data['title'];?>" src="<?php echo 'images/tintuc/'.$data['image'];?>" />
        </p>
        <div class="news_bodyread">
            <?php echo $data['intro']; ?>
        </div>
        <div class="news_bodyread">
            <?php echo $data['content']; ?>
        </div>
    </div>
</div>
<div class="news-comment">
    <?php include getModulePath("comments"); ?>
</div>
<?php
}
?>