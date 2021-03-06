<?php
require 'config.php';
require 'library/mylibs.php';
require 'library/function.php';
require getLibsPath('connect');
session_start();
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Tin tức</title>
    <link rel="shortcut icon" type="image/png" href="images/pool-boat-icon-title.png" />
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <link href="css/main.css" rel="stylesheet" />
    <link href="css/searchbox.css" rel="stylesheet" />
    <link href="css/navbar.css" rel="stylesheet" />
    <link href="css/new-box.css" rel="stylesheet" />
    <link href="css/newsNaviwrapper.css" rel="stylesheet" />
    <link href="css/comment.css" rel="stylesheet" />
    <link href="css/auto-complete.css" rel="stylesheet" />
    <link href="css/jquery-ui.min.css" rel="stylesheet" />
    <script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="js/auto-complete.min.js"></script>
    <script type="text/javascript" src="js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="js/mainjs.js"></script>
</head>
<body>
    <div id="header">
        <?php include getModulePath('header');?>
    </div>

    <div id="contents">
        <?php
            if(!isset($_GET['cat'])&&!isset($_GET['search']))
            {
        ?>
        <div id="new-slideshow"></div>
        <?php
            }
            else
            {
                if(isset($_GET['cat']))
                {
                    require_once getModelPath('model_danhmuc');
                    $cat = thong_tin_sua_dm($conn,$_GET['cat']);
                    if($cat == null)
                    {
                        @header('Location: .');
                        echo '<h3>Danh mục không tồn tại<h3>';
                        return;
                    }
        ?>
        <h1>
            <?php echo $cat['name'];?>
        </h1>
        <?php
                }
            }
        ?>
        <div id="new-contents">
            <div id="new-contents-left">
                <?php
                    $module=getReGet('ac','list');
                    switch($module)
                    {
                        case 'list':{
                            include getModulePath('list_news_index');
                            break;
                        }
                        case 'news':{
                            include getModulePath('news_detail');
                            break;
                        }
                        default:{
                            include getModulePath('list_news_index');
                            break;
                        }
                    }
                ?>
            </div>
            <div id="new-contents-right">
                <?php include getModulePath('right');?>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</body>
</html>
