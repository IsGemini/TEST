<?php
    header('content-type:text/html;charset=utf-8');
    session_start();
    include ("db.class.php");
    $db = new db();
    //接收数据
    $account  = $_POST['account'];
    $password = $_POST['password'];
    $sql = " select password from user where account = '{$account}' ";
    $arr = $db->Query($sql);

    //判断账户密码与数据库是否一致
    if (!empty($account) && !empty($password) && $password == $arr[0][0]){
        //跳转页面前，把账号存到session里面
        $_SESSION['account'] = $account;
        header("location:main.php");
        //echo '登陆成功';
    }else{
        echo "登录失败！";
    }
?>