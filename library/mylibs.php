<?php
//get Path
function getMyPath($path='')
{
    if(defined("BASE_PATH"))
        return BASE_PATH.$path;
    return str_replace('\\','/',dirname(__DIR__)).'/'.$path;
}
function getLibsPath($name='index')
{
    return getMyPath('library/'.$name.'.php');
}
function getModulePath($name='index')
{
    return getMyPath('module/'.$name.'.php');
}
function getModelPath($name='index')
{
    return getMyPath('model/'.$name.'.php');
}
//get Link
function getMyLink($path=array())
{
    return '?'.http_build_query($path);
}
function getMyLinkWithGet($path=array())
{
    if(!isset($path['ac'])&&isset($_GET['ac']))
        $path['ac']=$_GET['ac'];
    if(!isset($path['cat'])&&isset($_GET['cat']))
        $path['cat']=$_GET['cat'];
    return getMyLink($path);
}

//get value GET, POST
function getReGet($name,$default='')
{
    return isset($_GET[$name])?$_GET[$name]:$default;
}
function getRePost($name,$default='')
{
    return isset($_POST[$name])?$_GET[$name]:$default;
}