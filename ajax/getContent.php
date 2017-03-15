<?php
//$data=query('SELECT news.id,news.title,news.intro,news.image,news.category_id,category.`name` FROM news INNER JOIN category ON news.category_id = category.id ORDER BY news.id DESC');
require '../config.php';
require '../library/mylibs.php';
require '../library/function.php';
require getLibsPath('connect');
$module = getReGet('ac','list');
switch($module)
{
    case 'news':{
            include getModulePath('news_detail');
            break;
        }
    default:{
            include getModulePath('list_news_index');
            break;
        }
}