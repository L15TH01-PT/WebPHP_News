<div class="newsNaviwrapper">
    <p class="nsa_title1">Latest News</p>
    <?php
    require_once getModelPath('model_tintuc');
    $list=moi_nhat_tung_cat($conn);
    foreach ($list as $data)
    {
    ?>
    <div class="newsNaviBox">
        <p class="nnb_news">
            <a href="<?php echo getMyLink(array('cat'=>$data['category_id'])); ?>"><?php echo $data['name']; ?></a>
        </p>
        <div class="newsNaviBoxin">
            <p class="nnb_pic">
                <img width="80" height="60" alt="<?php echo $data['title'];?>" src="<?php echo 'images/tintuc/'.$data['image'];?>">
            </p>
            <div class="nnb_bodyarea">
                <p class="nnb_title js-nnb_title"><a href="<?php echo getMyLink(array('ac'=>'news','news'=>$data['id'])); ?>"><?php echo $data['title'];?></a></p>
                <p class="nnb_day">Jul. 23, 2016 00:00</p>
            </div>
            <div class="clear"></div>
        </div>
        <div class="clear"></div>
    </div>
    <?php }?>
</div>