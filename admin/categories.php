<?php 
  include_once "../function.php";
  $link = connect();
  $sql = "SELECT * FROM category";
  // print_r($link,$sql);=
  // print_r($res);
  
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="utf-8">
  <title>Categories &laquo; Admin</title>
  <link rel="stylesheet" href="/static/assets/vendors/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="/static/assets/vendors/font-awesome/css/font-awesome.css">
  <link rel="stylesheet" href="/static/assets/vendors/nprogress/nprogress.css">
  <link rel="stylesheet" href="/static/assets/css/admin.css">
  <script src="/static/assets/vendors/nprogress/nprogress.js"></script>
</head>
<body>
  <script>NProgress.start()</script>
  <div class="main">
    <nav class="navbar">
      <button class="btn btn-default navbar-btn fa fa-bars"></button>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="profile.php"><i class="fa fa-user"></i>个人中心</a></li>
        <li><a href="login.php"><i class="fa fa-sign-out"></i>退出</a></li>
      </ul>
    </nav>
    <div class="container-fluid">
      <div class="page-title">
        <h1>分类目录</h1>
      </div>
      <!-- 有错误信息时展示 -->
      <div class="alert alert-danger">
        <strong>错误！</strong>填写内容发生错误
      </div>
      <!-- 有错误信息时展示 -->
      <!-- 有成功信息时展示 -->
      <div class="alert alert-success">
      </div>
      <!-- 有成功信息时展示 -->
      <div class="row">
        <div class="col-md-4">
          <form action = "">
            <h2>添加新分类目录</h2>
            <div class="form-group">
              <label for="name">名称</label>
              <input id="name" class="form-control" name="name" type="text" placeholder="分类名称">
            </div>
            <div class="form-group">
              <label for="slug">类名</label>
              <input id="slug" class="form-control" name="classname" type="text" placeholder="classname">
            </div>
            <div class="form-group">
              <span class="btn btn-primary" type="submit">添加</span>
            </div>
          </form>
        </div>
        <div class="col-md-8">
          <div class="page-action">
            <!-- show when multiple checked -->
            <a class="btn btn-danger btn-sm" href="javascript:;" style="display: none">批量删除</a>
          </div>
          <table class="table table-striped table-bordered table-hover">
            <thead>
              <tr>
                <th class="text-center" width="40"><input type="checkbox"></th>
                <th>名称</th>
                <th>类名</th>
                <th class="text-center" width="100">操作</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="text-center"><input type="checkbox"></td>
                <td>未分类</td>
                <td>fa-fire</td>
                <td class="text-center">
                  <a href="javascript:;" class="btn btn-info btn-xs">编辑</a>
                  <a href="javascript:;" class="btn btn-danger btn-xs">删除</a>
                </td>
              </tr>
              <tr>
                <td class="text-center"><input type="checkbox"></td>
                <td>奇趣事</td>
                <td>fa-fire</td>
                <td class="text-center">
                  <a href="javascript:;" class="btn btn-info btn-xs">编辑</a>
                  <a href="javascript:;" class="btn btn-danger btn-xs">删除</a>
                </td>
              </tr>
              <tr>
                <td class="text-center"><input type="checkbox"></td>
                <td>奇趣事</td>
                <td>fa-fire</td>
                <td class="text-center">
                  <a href="javascript:;" class="btn btn-info btn-xs">编辑</a>
                  <a href="javascript:;" class="btn btn-danger btn-xs">删除</a>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <div class="aside">
    <div class="profile">
      <img class="avatar" src="../uploads/avatar.jpg">
      <h3 class="name">布头儿</h3>
    </div>
    <ul class="nav">
      <li>
        <a href="index.php"><i class="fa fa-dashboard"></i>仪表盘</a>
      </li>
      <li class="active">
        <a href="#menu-posts" data-toggle="collapse">
          <i class="fa fa-thumb-tack"></i>文章<i class="fa fa-angle-right"></i>
        </a>
        <ul id="menu-posts" class="collapse in">
          <li><a href="posts.php">所有文章</a></li>
          <li><a href="post-add.php">写文章</a></li>
          <li class="active"><a href="categories.php">分类目录</a></li>
        </ul>
      </li>
      <li>
        <a href="comments.php"><i class="fa fa-comments"></i>评论</a>
      </li>
      <li>
        <a href="users.php"><i class="fa fa-users"></i>用户</a>
      </li>
      <li>
        <a href="#menu-settings" class="collapsed" data-toggle="collapse">
          <i class="fa fa-cogs"></i>设置<i class="fa fa-angle-right"></i>
        </a>
        <ul id="menu-settings" class="collapse">
          <li><a href="nav-menus.php">导航菜单</a></li>
          <li><a href="slides.php">图片轮播</a></li>
        </ul>
      </li>
    </ul>
  </div>    
  <script src="/static/assets/vendors/jquery/jquery.js"></script>
  <script src="/static/assets/vendors/bootstrap/js/bootstrap.js"></script>
  <script>NProgress.done()</script>
  <script src="../static/assets/vendors/art-template/template-web.js"></script>
  <!-- 创建模板 -->
  <script id="template" type="text/html">
    <tr>
      <td class="text-center"><input type="checkbox" value="{{insertid}}"></td>
      <td>{{catname}}</td>
      <td>{{classname}}</td>
      <td class="text-center">
        <a href="javascript:;" class="btn btn-info btn-xs">编辑</a>
        <a href="javascript:;" class="delCat btn btn-danger btn-xs">删除</a>
      </td>
    </tr>
  </script>
  <!-- 创建模板 -->
  <script>
  //---------增-----------
  $('.btn-primary').on('click', function () {
    //获取
    var catName = $('#name').val();
    // console.log(catName);
    var slug = $('#slug').val();
    // console.log(slug);
    //验证
    if ($.trim(catName)==''||$.trim(slug)=='') {
      // console.log(123);
      $('.alert-danger').show();
      // return;
      // console.log(123);
    }else{
      $('.alert-danger').hide();
    };
    
    //AJAX动态生成
  $.post("../api/addCat.php", {"cat_name":catName,"classname":slug},
    function (res) {
      if (res.code == 200) {
        //清空输入的内容
          console.log(123);
          $('.alert-danger').show().html('<strong>'+res.message+'</strong>');
          $('#name').attr('placeholder','');
          $('#slug').attr('placeholder','');
        //拼接至表格中
        var data = {
          catname:catName,
          classname:slug,
          insertid = res.ins,
        }

      }
    },
    "json"
  );
  });
  </script>
</body>
</html>
