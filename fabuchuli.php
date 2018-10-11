<?php
session_start();
if(empty($_SESSION['account'])){
    header("location:index.php");
    exit;
}
$sender   = $_SESSION['account'];
$receiver = $_POST['receiver'];
$content  = $_POST['content'];
$time     = time();
echo $sender;
echo $receiver;
echo $content;
echo $time;
include ("db.class.php");
$db  = new db();
$sql = " select id from user where account = '$receiver' ";
if($db->Query($sql) > 0){
    $insert_sql = " insert into message_board (sender, receiver, title,content,create_time) VALUES ('{$sender}','{$receiver}','','{$content}','{$time}') ";
    echo $insert_sql;
    if($db->Query($insert_sql,0)){
        header("location:main.php");
    }else{
//        echo '发布失败！';
//        echo $insert_sql;
    }
}else{
    echo '该用户不存在！';
}
?>