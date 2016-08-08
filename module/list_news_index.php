<div id="new-slideshow"></div>
<div id="new-contents">
    <div id="new-contents-left">
        <?php
        $data=query('SELECT * FROM tintuc');
        print_r($data);
        include getModulePath('list/item');
        include getModulePath('list/item');
        include getModulePath('list/item');
        include getModulePath('list/item');
        include getModulePath('list/item');
?>
    </div>
    <div id="new-contents-right">
        <?php include getModulePath('right');?>
    </div>
</div>
