<body>
<div><h3>我的留言</h3></div>
<a href="issue.php" rel="external nofollow">给TA留言</a><br><br>
<table border="1" cellpadding="0" cellspacing="0" width="60%" >
    <tr>
        <td>发送人</td>
        <td>留言内容</td>
        <td>发送时间</td>
    </tr>
    <?php
        session_start();
        if(empty($_SESSION['account'])){
            header("location:index.php");
        }
        $account = $_SESSION['account'];
        include ("db.class.php");
        $db  = new db();
        $sql = " select * from message_board where receiver = '$account'";
        $arr = $db->Query($sql);
        //var_dump($arr);
        foreach ($arr as $val){
            $time = date('Y-m-d H:i:s',$val[5]);
            echo "
            <tr>
                <td>{$val[1]}</td>
                <td>{$val[4]}</td>
                <td>{$time}</td>
            </tr>
            ";
        }
    ?>
</table>
</body>