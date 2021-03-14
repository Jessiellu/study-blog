<html>
<head>
    <meta charset="UTF-8"/>
    <title>学生成绩管理系统</title>
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
        $num=0;
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
    <div id="left" align="left">请选择您需要的服务</div>

    <div id="link">
        <ul>
            <li><a href="add.php">录入学生信息</a></li>
            <li><a href="search.php">查询学生信息</a></li>
            <li><a href="course.php">查看课程信息</a></li>
            <li><a href="class.php">查看班级信息</a></li>
        </ul>
    </div>

    <div id="content" align="center">
        <form action="" method="get" style="padding-top: 10px">
            <div><h2>请选择班级进行查看：</h2></div>
            <input type="submit" name="sub1" value="计科1班"/>
            <input type="submit" name="sub2" value="计科2班"/>

        <table align="center" border="1px" width="500px" cellpadding="0px" cellspacing="0px" style="margin: 30px;">
            <?php
            //连接数据库
            require_once 'db_connect.php';
            if (isset($_GET['sub1']))
            {
                $class='计科1班';
                //获取数据库的班级进行配对
                $sql="select * from stu_info where class='{$class}'";
                $result=mysql_query($sql);
                $num=mysql_num_rows($result);
            ?>
            <tr>
                <th>班级</th>
                <th>学号</th>
                <th>姓名</th>
                <th>性别</th>
            </tr>
            <?php
            while($msg=mysql_fetch_assoc($result))
            {
                ?>
                <tr align="center">
                    <td><?php echo $msg['class'] ?></td>
                    <td><?php echo $msg['id'] ?></td>
                    <td><?php echo $msg['name'] ?></td>
                    <td><?php echo $msg['sex'] ?></td>
                </tr>

                <?php
            }
            }
            if (isset($_GET['sub2']))
            {
                $class='计科2班';
                //获取数据库的班级进行配对
                $sql="select * from stu_info where class='{$class}'";
                $result=mysql_query($sql);
                $num=mysql_num_rows($result);
                ?>
                <tr>
                    <th>班级</th>
                    <th>学号</th>
                    <th>姓名</th>
                    <th>性别</th>
                </tr>
                <?php
                while($msg=mysql_fetch_assoc($result))
                {
                    ?>
                    <tr align="center">
                        <td><?php echo $msg['class'] ?></td>
                        <td><?php echo $msg['id'] ?></td>
                        <td><?php echo $msg['name'] ?></td>
                        <td><?php echo $msg['sex'] ?></td>
                    </tr>

                    <?php
                }
            }
        ?>
        </table>
            <div style="font-size: 17px;color: rgb(98,94,91);"><p>共有<?php echo $num ?>条数据</p></div>
        </form>
    </div>
</div>
</body>
</html>
