<html>
<head>
    <meta charset="UTF-8"/>
    <title>学生成绩管理系统</title>
    <!--    导入CSS样式文件-->
    <link href="stype.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<div id="bidTitle" align="center">学生成绩管理系统</div>
<div id="roll"><marquee>欢迎登录，您可以进行查询个人信息、课程成绩，以及课程查询等操作^v^</marquee></div>
<div id="weluser" align="right"><p>欢迎
        <?php
        session_start();
        $username=$_SESSION['username'];
        //引入链接数据库的模板文件
        require_once 'db_connect.php';
        //获取用户名显示到页面上
        if (!isset($_SESSION['username']))
        {
            ?>
            <script type="text/javascript">
                alert("您还未登录，请登录！");
                window.location.href="login_in.php";
            </script>

            <?php
        }
        else echo $username;
        ?>
        登录 | <a href="login_in.php">退出</a></p>
</div>
<div id="right">
    <div id="left" align="left">请选择您需要的服务</div>
    <div id="link">
        <ul>
            <li><a href="search.php">查询学生信息</a></li>
            <li><a href="select_stu.php">查看个人信息</a></li>
            <li><a href="course.php">查看课程信息</a></li>
        </ul>
    </div>

    <div id="content" align="center">
        <p>欢迎登录，请在左边选择功能</p>

        <div id="btn"></div>
    </div>
</div>
</body>
</html>