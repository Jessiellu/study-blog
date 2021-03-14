<?php
header('content-type:text/html;charset=utf-8');
//建立数据库连接
require_once 'db_connect.php';
//获取当前的id
$stu_id=$_GET['id'];
//获取当前留言详细信息
$sql="select * from stu_info where id ={$stu_id}";
$results =mysql_query($sql);
$info =mysql_fetch_assoc($results);
$avg0=mysql_fetch_assoc(mysql_query("select (yuwen+math+english)/3 as avg_score from stu_info where id='{$info['id']}'"));
$sum=mysql_fetch_assoc(mysql_query("select sum(yuwen+math+english) as sum_score from stu_info where id='{$info['id']}'"));
?>
<html>
<head>
    <meta charset="UTF-8"/>
    <title>查询学生信息</title>
    <!--    导入CSS样式文件-->
    <link href="stype.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<div id="bidTitle" align="center">学生成绩管理系统</div>
<div id="weluser" align="right"><p>欢迎
        <?php
        session_start();
        $username=$_SESSION['username'];
        $id=$_SESSION['id'];
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
        登录 |&nbsp
        <?php
        if ($id==1)
        {
            ?>
            <a href="index.php">返回主页</a>
            <?php
        }
        else
        {
            ?><a href="indexs.php">返回主页</a>
            <?php
        }
        ?>
        &nbsp| <a href="login_in.php">退出</a>
</div>
<div id="right">
    <div id="left" align="left">查看学生信息</div>

    <div id="link">
        <ul>
            <li><a href="">查看学生信息</a></li>
        </ul>
    </div>

    <div id="content" align="center">
        <table border="1px" width="600px" height="350px" cellpadding="0px" cellspacing="0px" style="margin: 30px;">
            <!--tr表示行   th表示表头  td表示列-->
            <tr>
                <th colspan="4" align="left" height="60px">个人信息</th>

                <td colspan="2" rowspan="2" align="center"><img src="image/student.jpg" width="80px" height="80px"/></td>
                <br/>
            </tr>
            <tr>
                <th height="40px">姓名</th>
                <td height="40px"><?php echo $info['name'] ?></td>
                <th height="40px">性别</th>
                <td height="40px"><?php echo $info['sex'] ?></td>
            </tr>
            <tr>
                <th  width="100px" height="40px">班级</th>
                <td><?php echo $info['class'] ?></td>
                <th width="100px" height="40px">学院</th>
                <td><?php echo $info['major'] ?></td>
                <th  width="100px" height="40px">学号</th>
                <td><?php echo $info['id'] ?></td>
            </tr>
            <tr>
                <th colspan="6" height="50px">成绩</th>
            </tr>
            <tr>
                <th height="40px">语文</th>
                <th height="40px">数学</th>
                <th height="40px">英语</th>
                <th height="40px">总分</th>
                <th colspan="2" height="40px">平均分</th>
            </tr>
            <tr>
                <td height="50px"><?php echo $info['yuwen']; ?></td>
                <td height="50px"><?php echo $info['math']; ?></td>
                <td height="50px"><?php echo $info['english']; ?></td>
                <td height="50px"><?php echo $sum['sum_score']; ?></td>
                <td colspan="2" height="50px"><?php echo $avg0['avg_score']; ?></td>
            </tr>
        </table>
    </div>
</div>
</body>
</html>
