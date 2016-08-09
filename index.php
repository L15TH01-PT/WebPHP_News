<?php
require 'config.php';
require 'library/mylibs.php';
require getLibsPath('connect');
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Tin tức</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <link href="css/main.css" rel="stylesheet" />
    <link href="css/searchbox.css" rel="stylesheet" />
    <link href="css/navbar.css" rel="stylesheet" />
    <link href="css/new-box.css" rel="stylesheet" />
    <link href="css/newsNaviwrapper.css" rel="stylesheet" />
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
