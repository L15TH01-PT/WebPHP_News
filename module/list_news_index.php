<?php
if(!isset($_GET['cat']))
{
?>
<div id="new-slideshow"></div>
<?php
}
else
{
    require_once getModelPath('model_danhmuc');
    echo '0';
    $cat = thong_tin_sua_dm($conn,$_GET['cat']);
    echo '1';
    if($cat == null)
    {
        echo '2';
        header('Location: .');
        return;
    }
    
?>
<h1><?php echo $cat['name'];?></h1>
<?php
}?>
<div id="new-contents">
    <div id="new-contents-left">
        <?php
        //$data=query('SELECT news.id,news.title,news.intro,news.image,news.category_id,category.`name` FROM news INNER JOIN category ON news.category_id = category.id ORDER BY news.id DESC');
        require_once getModelPath('model_tintuc');
        require_once getModulePath('list/item');
        foreach (danh_sach_tt_main($conn,getReGet('page',1),getReGet('cat',0)) as $item)
        {
        	addListNewsItem($item);
        }
?>
    </div>
    <div id="new-contents-right">
        <?php include getModulePath('right');?>
    </div>
</div>
