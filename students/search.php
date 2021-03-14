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
    <div id="left" align="left">查询学生信息</div>

    <div id="link">
        <ul>
            <li><a href="search.php">查询学生信息</a></li>

            <li><a href="select_te.php">查看所有学生信息</a></li>
        </ul>
    </div>

    <div id="content" align="center">
        <div align="left"><p style="font-size: 18px">请搜索学生学号进行操作</p></div>
        <form action="" method="post" style="padding-top: 10px">
            <input type="text" name="check" style="border-radius: 3px;line-height: 26px;width: 240px;" placeholder="请输入要查询学生的学号"/>
            <input type="submit" value="查询" style="width: 70px;height: 30px;border: 1px;background-color: #00bee7;color: #fff;border-radius: 3px;"/>
        </form>
        <?php
        //引入链接数据库的模板文件
        require_once 'db_connect.php';

        //获取用户信息
        $Id=$_POST['check'];
        //获取数据库的学号进行配对
        $sql1="select * from stu_info where id='{$Id}'";
        $result=mysql_query($sql1);//执行一条 MySQL 查询

        if (!$result)
        {
            die('无法读取数据,请联系管理员修复:'.mysqli_error());
        }
        echo "<table align=\"center\" border=\"1px\" width=\"500px\" cellpadding=\"0px\" cellspacing=\"0px\">";
        while($msg=mysql_fetch_assoc($result))
        {
            ?>

            <tr>
                <th>学号</th>
                <th>班级</th>
                <th>姓名</th>
                <th>性别</th>
                <th>操作</th>
            </tr>
            <tr align="center">
                <td><?php echo $msg['id'] ?></td>
                <td><?php echo $msg['class'] ?></td>
                <td><?php echo $msg['name'] ?></td>
                <td><?php echo $msg['sex'] ?></td>
                <td>
                    <a href="select.php?id='<?php echo $msg['id'] ?>'">查看</a>
                    <?php
                    if ($id==1)
                    {
                        ?>
                        <a href="insert.php?id='<?php echo $msg['id'] ?>'">修改</a>
                        <a href="delete.php?id='<?php echo $msg['id'] ?>'">删除</a>
                        <?php
                    }
                        ?>

                </td>
            </tr>
            </table>
            <?php
        }
        ?>
    </div>
</div>
</div>
</body>
</html>