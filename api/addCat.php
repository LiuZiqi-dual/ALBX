<?php 
    include_once "../function.php";
    //获取参数
    $catName = $_POST["cat_name"];
    $slug = $_POST["classname"];
    //判断类名是否重复
    $connect = connect();
    $sql = "SELECT * FROM category WHERE cat_name = $catName";
        //执行sql语句
        $selectRes = query($connect,$sql);
        //判断
        if ($selectRes) {
            $response = [
                'code'=>-1,
                'message'=>'该类名已存在',
            ];
            echo json_encode($response);
            die();
        }
    //入库
    $sql2 = "INSERT INTO category(cat_nameclassname) VALUES ('$cat_name','$classname')";
    $insertRes = mysqli_query($connect,$sql2);
    //返回数据
    if ($insertRes) {
        $response = [
            'code'=>200, 
            'message'=>'添加分类成功',
            'insert_id'=>mysqli_insert_id($connect),
        ];
    }
    echo json_encode($response);
?>