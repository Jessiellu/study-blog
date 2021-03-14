<html>
<head>
    <meta charset="UTF-8"/>
    <title>录入学生信息</title>
    <!--    导入CSS样式文件-->
    <link href="stype.css" rel="stylesheet" type="text/css"/>
    <script type="text/javascript">
        function checkit(form1) {
            if (form1.stu_id.value=="")
            {
                alert("学号不能为空！");
                form1.stu_id.focus();
                return false;
            }
            if (form1.name.value=="")
            {
                alert("姓名不能为空！");
                form1.name.focus();
                return false;
            }
            if (form1.class.value=="")
            {
                alert("班级不能为空！");
                form1.class.focus();
                return false;
            }
            return true;
        }
    </script>
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
        登录 | <a href="index.php">返回主页</a> | <a href="login_in.php">退出</a>
</div>
<div id="right">
    <div id="left" align="left">录入学生信息</div>

    <div id="link">
        <ul>
            <li><a href="add.php">录入学生信息</a></li>
            <li><a href="search.php">查询学生信息</a></li>
            <li><a href="course.php">查看课程信息</a></li>
            <li><a href="class.php">查看班级信息</a></li>
        </ul>
    </div>

    <div id="content" align="center">
        <form name="form1" action="" method="post">
            <?php
            //引入数据库文件
            require_once 'db_connect.php';
            //获取界面上用户输入的用户名和密码 插入数据库
            if (isset($_POST['submit1']))
            {
            $name=$_POST['name'];//姓名
            $class=$_POST['class'];//班级
            $stu_id=$_POST['stu_id'];//学号
            $sex=$_POST['sex'];//性别
            $major=$_POST['major'];//所属学院
            $yuwen=$_POST['yuwen'];//语文
            $math=$_POST['math'];//数学
            $en=$_POST['english'];//英语
            $sql="insert into stu_info(id,name,class,sex,major,yuwen,math,english) values ('{$stu_id}','{$name}','{$class}','{$sex}','{$major}','{$yuwen}','{$math}','{$en}')";
            $result=mysql_query($sql);
            if($result)
            {
                if (mysql_affected_rows()==1)
                {
                    ?>
                    <script type="text/javascript">
                        alert("学生信息添加成功");
                    </script>
            <?php
                }
            }
            else
            {
                ?>
                <script type="text/javascript">
                    alert("学生信息添加失败");
                    history.back();
                </script>
            <?php
            }
            }
            ?>
            <table>
                <tr>
                    <h2>录入学生基本信息</h2>
                </tr>
            </table>
            <table>
                <tr>
                    <td>姓名：</td>
                    <td><input type="text" name="name" size="20"/></td>
                </tr>
                <tr>
                    <td>班级：</td>
                    <td><input type="text" name="class" size="20"/></td>
                </tr>
                <tr>
                    <td>学号：</td>
                    <td><input type="text" name="stu_id" size="20"/></td>
                </tr>
                <tr>
                    <td>性别：</td>
                    <td><input type="text" name="sex" size="20"/></td>
                </tr>
                <tr>
                    <td>所属学院：</td>
                    <td><input type="text" name="major" size="20"/></td>
                </tr>
            </table>
            <table>
                <tr><th>成绩</th></tr>
                <tr>
                    <td>语文：</td>
                    <td><input type="text" name="yuwen" size="20"/></td>
                </tr>
                <tr>
                    <td>数学：</td>
                    <td><input type="text" name="math" size="20"/></td>
                </tr>
                <tr>
                    <td>英语：</td>
                    <td><input type="text" name="english" size="20"/></td>
                </tr>
            </table>
            <div>
                <input type="submit" name="submit1" value="提交" onclick="return checkit(form1);" style ="height : 30px;border:1px;background-color:#00bee7;color:#fff;width:60px;border-radius: 3px;"/>
            </div>
        </form>
    </div>
</div>
</body>
</html>
