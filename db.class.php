<?php
class db{
    public $host  = "localhost";
    public $zhang = "root";//定义默认用户名
    public $mima  = "";//定义密码
    public $dbname = "guestbook";//数据库名

    //执行sql语句的方法
    public function Query($sql,$type = 1){
        $db = new mysqli($this->host,$this->zhang,$this->mima,$this->dbname);
        $r  = $db->query($sql);
        if($type == "1"){
            return $r->fetch_all();
        }else{
            return $r;
        }
    }
}