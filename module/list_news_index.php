<div id="new-slideshow"></div>
<div id="new-contents">
    <div id="new-contents-left">
        <?php
        $data=query('SELECT news.id,news.title,news.intro,news.image,news.category_id,category.`name` FROM news INNER JOIN category ON news.category_id = category.id ORDER BY news.id DESC');
        require_once getModulePath('list/item');
        foreach ($data as $item)
        {
        	addListNewsItem($item);
        }
?>
    </div>
    <div id="new-contents-right">
        <?php include getModulePath('right');?>
    </div>
</div>
