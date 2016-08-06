<?php

/**
 * mylibs short summary.
 *
 * mylibs description.
 *
 * @version 1.0
 * @author Yukito
 */
class mylibs
{
    //get Path
    public static function getMyPath($path='')
    {
        if(defined("BASE_PATH"))
            return BASE_PATH.$path;
        return str_replace('\\','/',dirname(__DIR__)).'/'.$path;
    }
    public static function getLibsPath($path='')
    {
        return self::getMyPath('libs/'.$path);
    }
    public static function getModulePath($path='')
    {
        return self::getMyPath('module/'.$path);
    }
    //include or require folder libs
    public static function include_libs($name='')
    {
        include(self::getLibsPath($name.'.php'));
    }
    public static function include_once_libs($name='')
    {
        include_once(self::getLibsPath($name.'.php'));
    }
    public static function require_libs($name='')
    {
        require(self::getLibsPath($name.'.php'));
    }
    public static function require_once_libs($name='')
    {
        require_once(self::getLibsPath($name.'.php'));
    }
    //include or require folder module
    public static function include_module($name='')
    {
        include(self::getModulePath($name.'.php'));
    }
    public static function include_once_module($name='')
    {
        include_once(self::getModulePath($name.'.php'));
    }
    public static function require_module($name='')
    {
        require(self::getModulePath($name.'.php'));
    }
    public static function require_once_module($name='')
    {
        require_once(self::getModulePath($name.'.php'));
    }
    //get value GET, POST
    public static function getReGet($name,$default='')
    {
        return isset($_GET[$name])?$_GET[$name]:$default;
    }
    public static function getRePost($name,$default='')
    {
        return isset($_POST[$name])?$_GET[$name]:$default;
    }
}