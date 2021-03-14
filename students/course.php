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
            <li><a href="course.php">查看课程信息</a></li>
        </ul>
    </div>

    <div id="content" align="center">
        <div><h2>课程信息</h2></div>
        <table align="center" border="1px" width="500px" cellpadding="0px" cellspacing="0px" style="margin: 30px;">
            <?php
            //连接数据库
            require_once 'db_connect.php';
            $sql="select * from course";
            $result=mysql_query($sql);
            $total=mysql_num_rows($result);
            if (isset($_GET['page']))
            {
                $page=$_GET['page'];
            }
            else
            {
                $page=1;
            }
            //每页显示10条数据
            $pageSize=3;
            $pageMaxNum=ceil($total/$pageSize);
            $beginSize=($page-1)*$pageSize;

            $sql1="select * from course limit {$beginSize},{$pageSize}";
            $results=mysql_query($sql1);
            ?>
            <tr>
                <th>课程名称</th>
                <th>授课老师</th>
                <th>考核方式</th>
            </tr>
            <?php
            while($row=mysql_fetch_assoc($results))
            {
                ?>

                <tr align="center">
                    <td><?php echo $row['coursename'] ?></td>
                    <td><?php echo $row['teacher'] ?></td>
                    <td><?php echo $row['testtype'] ?></td>
                </tr>
                <?php
            }
            ?>
        </table>
        <table>
            <p>
                <span>共有<?php echo $total; ?>条数据，显示第<?php echo $page; ?>页/共<?php echo $pageMaxNum; ?>页
                    <a href="course.php?page=1">首页</a>
                    <a href="course.php?page=<?php if ($page>1) echo $page-1;else echo 1; ?>">上一页</a>
                    <a href="course.php?page=<?php if ($page<$pageMaxNum) echo $page+1;else echo $pageMaxNum; ?>">下一页</a>
                    <a href="course.php?page=<?php echo $pageMaxNum; ?>">尾页</a>
                </span>
            </p>
        </table>
    </div>
</div>
</body>
</html>
