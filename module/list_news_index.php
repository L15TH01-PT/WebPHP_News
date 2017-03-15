<?php
//$data=query('SELECT news.id,news.title,news.intro,news.image,news.category_id,category.`name` FROM news INNER JOIN category ON news.category_id = category.id ORDER BY news.id DESC');
require_once getModelPath('model_tintuc');
require_once getModulePath('list/item');
$total=0;
$page=getReGet('page',1);
$data=danh_sach_tt_main($conn,$total,getReGet('cat',0),$page,getReGet('search',''));
if(count($data) == 0)
{
    if(getReGet('search','')!='')
        echo "<p>Không tìm thấy tin tức cần tìm</p>";
    else
        echo "<p>Chưa có tin mới</p>";
}
else
{
    if(getReGet('search','')!='')
        echo "<p style='padding: 5px;margin-bottom: 25px;'>Tìm thấy <b>$total</b> tin tức";// với từ khóa <b>".getReGet('search','')."</b></p>";
    foreach ($data as $item)
    {
        addListNewsItem($item);
    }
    if($total>NUM_IN_PAGE)
    {
?>
<div id="list_news_page">
    <!--<?php
        if($page>1)
        {
            $getLink = array('page'=>$page-1);
            $url = getMyLinkWithGet($getLink);
            $urlAjax = getMyLinkAjaxWithGet($getLink);
    ?>
    <div class="back">
        <a href="<?php echo $url; ?>" onclick="return loadContentAjax('<?php echo $urlAjax; ?>','<?php echo $url; ?>')">Tin mới hơn</a>
    </div>
    <?php
        }
        if($page*NUM_IN_PAGE<$total)
        {
            $getLink = array('page'=>$page+1);
            $url = getMyLinkWithGet($getLink);
            $urlAjax = getMyLinkAjaxWithGet($getLink);
    ?>
    <div class="next">
        <a href="<?php echo $url;?>" onclick="return loadContentAjax('<?php echo $urlAjax; ?>','<?php echo $url; ?>')">Tin cũ hơn</a>
    </div>
    <?php
        }
    ?>-->
    <?php
        if($page*NUM_IN_PAGE<$total)
        {
            $getLink = array('page'=>$page+1);
            $url = getMyLinkWithGet($getLink);
            $urlAjax = getMyLinkAjaxWithGet($getLink);
    ?>
    <div class="next">
        <a href="#" onclick="return loadContentAjax('<?php echo $urlAjax; ?>','<?php echo $url; ?>')">Tin cũ hơn</a>
    </div>
    <?php
        }
    ?>
    <div class="clear"></div>
</div>
<?php
    }
}
?>