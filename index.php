<?php
require 'config.php';
require 'libs/mylibs.php';
require getLibsPath('query');
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <?php require getModulePath('head');?>
</head>
<body>
    <div id="header">
        <?php include getModulePath('header');?>
    </div>
    
    <div id="contents">
        <?php
        $module=getReGet('ac','list');
        switch($module)
        {
            case 'list':
                {
                    include getModulePath('list_news_index');
                break;
            }
            default:
            {
                include getModulePath('list_news_index');
                break;
            }
        }
        ?>
    </div>
</body>
</html>
