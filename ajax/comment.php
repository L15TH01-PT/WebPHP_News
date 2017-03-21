<?php
require '../config.php';
require '../library/mylibs.php';
require '../library/function.php';
require_once getLibsPath('connect');
require_once getModelPath('model_comment');
session_start();
if(isset($_SESSION[SESSION_USER]))
    $myuser = $_SESSION[SESSION_USER];
else
    $myuser = null;
$module = getRePost('ac','');
//sleep(5);
switch($module)
{
    case 'add':{
        if($myuser == null){
            echo 0;
            exit;
        }
        $data = array(
                'news_id'  => getRePost("news"),
                'user_id'  => $myuser["id"],
                'content'  => getRePost("content")
            );
        $newComment = add_comment($conn, $data);
        if($newComment != null){
            require_once getModulePath('comment/item');
            addCommentItem($newComment, $myuser);
        }
        else
            echo 0;
        exit;
    }
    case 'delete':{
        if($myuser == null)
            return 0;
        $id = getRePost("id");
        echo delete_comment($conn,$id);
        exit;
    }
    case 'loadcontent':{
        include getModulePath('comments');
        exit;
    }
    default:{
        break;
    }
}
