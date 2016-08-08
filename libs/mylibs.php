<?php
//get Path
function getMyPath($path='')
{
    if(defined("BASE_PATH"))
        return BASE_PATH.$path;
    return str_replace('\\','/',dirname(__DIR__)).'/'.$path;
}
function getLibsPath($name='')
{
    return getMyPath('libs/'.$name.'.php');
}
function getModulePath($name='')
{
    return getMyPath('module/'.$name.'.php');
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