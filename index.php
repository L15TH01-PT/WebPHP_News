<?php
require_once('config.php');
require_once('libs/mylibs.php');
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <?php mylibs::include_module('head');?>
</head>
<body>
    <div id="header">
        <?php mylibs::include_module('header');?>
    </div>
    
    <div id="contents">
        <?php
        $module=mylibs::getReGet('ac','list');
        switch($module)
        {
            case 'list':
            {
                mylibs::include_module('list_news_index');
                break;
            }
            default:
            {
                mylibs::include_module('list_news_index');
                break;
            }
        }
        ?>
    </div>
</body>
</html>
