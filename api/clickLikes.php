<?php include_once __DIR__.'/function.php';
    //获取详情页面的like信息
    $post_id = $_POST['post_id'];
    $link = connect();
    $sql = "SELECT likes FROM posts WHERE post_id =$post_id";
    $res = query($link,$sql);
    $elderLikes = $res[0]['likes'];

    //实时更新likes数据
    $sql1 = "update posts set likes = likes +1 where post_id = $post_id";
    $result = mysqli_query($link,$sql1);
    if ($result) {
        //成功则返回相对应的数据
        $response = [
            'code' => 200,
            'message' => 'success',
            'newLikes' => $elderLikes+1
        ];
    }
    else {
        //失败则返回相对应的数组
        $response = [
            'code' => -1,
            'message' => 'failed'
        ];
    }
    echo json_encode($response);
    include_once './'
?>