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
    <div class="new-contents-item-contents">
        <p class="news_day">Jul. 27, 2016 13:14</p>
        <h2 class="news_title">
            <a href="#"><?php echo $data['title'];?></a>
        </h2>
        <p class="news_pic">
            <img alt="EVENT / Wonder Festival 2016 Summer: Creator Edition [Event Report]" src="https://d3ieicw58ybon5.cloudfront.net/ex/315.472/0.0.1333.1991/u/7ed9323ae3e84f5e8ea3e35c1f77e97b.jpg" />
        </p>
        <p class="news_bodyread"><?php echo $data['intro']; ?></p>
    </div>
</div>
<?php } ?>