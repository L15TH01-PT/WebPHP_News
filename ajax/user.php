<?php
require '../config.php';
require '../library/mylibs.php';
require '../library/function.php';
require_once getLibsPath('connect');
require_once getModelPath('model_user');
session_start();
$module = getRePost('ac','');
switch($module)
{
    case 'login':{
        $user = trim(strip_tags(getRePost("user")));
        $pass = md5(getRePost("pass"));
        $data = array(
                'user'  => $user,
                'pass'  => $pass
            );
        echo web_login($conn, $data);
        return;
    }
    case 'logout':{
        echo web_logout();
        return;
    }
    case 'register':{
        $user = trim(strip_tags(getRePost("user")));
        $pass = md5(getRePost("pass"));
        $data = array(
                'user'  => $user,
                'pass'  => $pass
            );
        echo web_them_user($conn, $data);
        return;
    }
    case 'changepass':{
        if(!isset($_SESSION[SESSION_USER])){
            echo 0;
            return;
        }
        $myuser = $_SESSION[SESSION_USER];
        if($myuser["pass"] != md5(getRePost("oldpass"))){
            echo -1;
            return;
        }
        $pass = md5(getRePost("pass"));
        $data = array(
                'pass'  => $pass
            );
        echo web_change_pass($conn, $data);
        return;
    }
    case 'loadcontent':{
        include getModulePath("header/floatlogin");
        return;
    }
    default:{
        break;
    }
}