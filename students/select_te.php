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
        <div align="left"><p style="font-size: 18px">正在查看所有学生信息</p></div>
        <table align="center" border="1px" width="500px" cellpadding="0px" cellspacing="0px">
            <?php
            //连接数据库
            require_once 'db_connect.php';
            $sql="select * from stu_info";
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
            $pageSize=10;
            $pageMaxNum=ceil($total/$pageSize);
            $beginSize=($page-1)*$pageSize;

            $sql1="select * from stu_info limit {$beginSize},{$pageSize}";
            $results=mysql_query($sql1);
            ?>
            <tr>
                <th>学号</th>
                <th>班级</th>
                <th>姓名</th>
                <th>性别</th>
                <th>语文</th>
                <th>数学</th>
                <th>英语</th>
                <th>操作</th>
            </tr>
            <?php
            while($row=mysql_fetch_assoc($results))
            {
                ?>

                <tr align="center">
                    <td><?php echo $row['id'] ?></td>
                    <td><?php echo $row['class'] ?></td>
                    <td><?php echo $row['name'] ?></td>
                    <td><?php echo $row['sex'] ?></td>
                    <td><?php echo $row['yuwen'] ?></td>
                    <td><?php echo $row['math'] ?></td>
                    <td><?php echo $row['english'] ?></td>
                    <td>
                        <a href="select.php?id='<?php echo $row['id'] ?>'">查看</a>
                        <?php
                        if ($id==1)
                        {
                        ?>
                        <a href="insert.php?id='<?php echo $row['id'] ?>'">修改</a>
                        <a href="delete.php?id='<?php echo $row['id'] ?>'">删除</a>
                            <?php
                        }
                        ?>
                    </td>
                </tr>
                <?php
            }
            ?>
        </table>
        <table>
            <p>
                <span>共有<?php echo $total; ?>条数据，显示第<?php echo $page; ?>页/共<?php echo $pageMaxNum; ?>页
                    <a href="select_te.php?page=1">首页</a>
                    <a href="select_te.php?page=<?php if ($page>1) echo $page-1;else echo 1; ?>">上一页</a>
                    <a href="select_te.php?page=<?php if ($page<$pageMaxNum) echo $page+1;else echo $pageMaxNum; ?>">下一页</a>
                    <a href="select_te.php?page=<?php echo $pageMaxNum; ?>">尾页</a>
                </span>
            </p>
        </table>
    </div>
</div>
</body>
</html>