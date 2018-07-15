<?php 
    //连接数据库的函数
    function connect($ip,$username,$password,$tablename){
        $connect = mysqli_connect($ip,$username,$password,$tablename);
        return $connect;
    }
    //sql的查询函数
    function select($connect,$sql){
        mysqli_set_charset($connect,'utf-8');
        $res = mysqli_query($connect,$sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($res)) {
            $data[] = $row;
        }
        return $data;
    }
    //调试函数
    function dump($data){
        echo "<pre />";
        var_dump($data);
        die;
    }
?>