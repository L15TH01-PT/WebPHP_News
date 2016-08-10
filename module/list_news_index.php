<?php
//$data=query('SELECT news.id,news.title,news.intro,news.image,news.category_id,category.`name` FROM news INNER JOIN category ON news.category_id = category.id ORDER BY news.id DESC');
require_once getModelPath('model_tintuc');
require_once getModulePath('list/item');
$data=danh_sach_tt_main($conn,getReGet('page',1),getReGet('cat',0));
if(count($data) == 0)
{
    echo "Chưa có tin mới";
}
else
{
    foreach ($data as $item)
    {
        addListNewsItem($item);
    }
}
?>
