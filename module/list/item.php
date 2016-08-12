<?php
function addListNewsItem($data)
{
?>
<div class="new-contents-item">
    <div class="new-contents-item-category">
        <div class="new-contents-item-category-bg">
            <p class="new-contents-item-category-text">
                <a href="<?php echo getMyLink(array('cat'=>$data['category_id'])); ?>"><?php echo $data['name']; ?></a>
            </p>
        </div>
    </div>
    <a href="<?php echo getMyLink(array('ac'=>'news','news'=>$data['id'])); ?>">
        <div class="new-contents-item-contents">
            <p class="news_day"><?php echo convert_time($data['time_news']);?></p>
            <h2 class="news_title">
                <?php echo $data['title'];?>
            </h2>
            <p class="news_pic">
                <img alt="<?php echo $data['title'];?>" src="<?php echo 'images/tintuc/'.$data['image'];?>" />
            </p>
            <p class="news_bodyread"><?php echo NL2br(strip_tags($data['intro'])); ?></p>
        </div>
    </a>
</div>
<?php } ?>