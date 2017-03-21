
<div id="header-search-contents" class="grid-container">
    <div id="header-search-left">
        <a class="grid-container" href="<?php echo getMyLink();?>">
            <img src="images/pool-boat-icon.png" /><span>News</span>
        </a>
    </div>
    <div id="header-search-main">
        <form action="" style="width: 100%; margin: auto;">
            <input class="search" type="text" name="search" placeholder="Nhập nội dung cần tìm.." />
        </form>
        <script type="text/javascript">
            var my_autoComplete = new autoComplete({
                selector: 'input[name="search"]',
                minChars: 1,
                delay: 150,
                source: function (term, response) {
                    //$.getJSON('/ajax/search.php', { q: term }, function (data) { response(data); });
                    $.getJSON('ajax/search.php', { q: term }, function (data) { response(data); });
                }
            });

            //my_autoComplete.destroy();
        </script>
    </div>
    <div class="clear"></div>
</div>