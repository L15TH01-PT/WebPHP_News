<div class="newsNaviwrapper">
    <p class="nsa_title1">Tin mới nhất</p>
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
                <a href="<?php echo getMyLink(array('ac'=>'news','news'=>$data['id'])); ?>"><img alt="<?php echo $data['title'];?>" src="<?php echo 'images/tintuc/'.$data['image'];?>"></a>
            </p>
            <div class="nnb_bodyarea">
                <p class="nnb_title js-nnb_title"><a href="<?php echo getMyLink(array('ac'=>'news','news'=>$data['id'])); ?>"><?php echo $data['title'];?></a></p>
                <p class="nnb_day"><?php echo convert_time($data['time_news']);?></p>
            </div>
            <div class="clear"></div>
        </div>
        <div class="clear"></div>
    </div>
    <?php }?>
</div>