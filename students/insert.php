<?php
header('content-type:text/html;charset=utf-8');
//建立数据库连接
require_once 'db_connect.php';
//获取当前的id
$stu_id=$_GET['id'];
//获取当前留言详细信息
$sql0="select * from stu_info where id ={$stu_id}";
$result0 =mysql_query($sql0);
$info =mysql_fetch_assoc($result0);

//更新留言信息
if(isset($_POST['submit1'])){ //用户已经提交post表单
    //获取表单数据
    $name=$_POST['name'];  //获取姓名
    $sex=$_POST['sex'];  //获取姓名
    $class=$_POST['class'];//获取班级
    $major=$_POST['major'];//获取学院
    $yuwen=$_POST['yuwen'];//获取成绩
    $math=$_POST['math'];//获取成绩
    $english=$_POST['english'];//获取成绩
//    执行sql语句
    $sql ="update stu_info set name='{$name}',class ='{$class}',sex='{$sex}',major='{$major}',yuwen='{$yuwen}',math='{$math}',english='{$english}' where id ={$stu_id}";
    $result=mysql_query($sql);
    if($result)
    {
        if (mysql_affected_rows()==1)
        {
            ?>
            <script type="text/javascript">
                alert("学生信息修改成功");
                window.location.href="select_te.php";
            </script>
            <?php
        }
    }
    else
    {
        ?>
        <script type="text/javascript">
            alert("学生信息修改失败");
            history.back();
        </script>
        <?php
    }

}

?>
<html>
<head>
    <meta charset="UTF-8"/>
    <title>修改学生信息</title>
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
        登录 | <a href="index.php">返回主页</a> | <a href="login_in.php">退出</a>
</div>
<div id="right">
    <div id="left" align="left">修改学生信息</div>

    <div id="link">
        <ul>
            <li><a href="select_te.php">修改学生信息</a></li>
        </ul>
    </div>

    <div id="content" align="center">
        <form name="form1" action="" method="post">
        <table border="1px" width="600px" height="350px" cellpadding="0px" cellspacing="0px"style="margin: 30px">
            <!--tr表示行   th表示表头  td表示列-->
            <tr>
                <th colspan="5" align="left">个人信息</th>

                <th width="100px" height="80px"><img src="image/student.jpg" width="80px" height="80px"/></th>
                <br/>
            </tr>
            <tr>
                <th height="30px" colspan="2">姓名</th>
                <td><input type="text" name="name" size="20" value="<?php echo $info['name'] ?>"/></td>
                <th height="30px" colspan="2">性别</th>
                <td><input type="text" name="sex" size="5" value="<?php echo $info['sex'] ?>"/></td>
            </tr>
            <tr>
                <th  width="100px" height="30px">班级</th>
                <td><input type="text" name="class" size="15" value="<?php echo $info['class'] ?>"/></td>
                <th width="50px" height="30px">学院</th>
                <td><input type="text" name="major" size="15" value="<?php echo $info['major'] ?>"/></td>
                <th  width="100px" height="30px">学号</th>
                <td><?php echo $info['id'] ?></td>
            </tr>
            <tr>
                <th colspan="6" height="50px">成绩</th>
            </tr>
            <tr>
                <th colspan="2" height="40px">语文</th>
                <th colspan="2" height="40px">数学</th>
                <th colspan="2" height="40px">英语</th>

            </tr>
            <tr>
                <td colspan="2" height="40px"><input type="text" name="yuwen" size="10" value="<?php echo $info['yuwen'] ?>"/></td>
                <td colspan="2" height="40px"><input type="text" name="math" size="10" value="<?php echo $info['math'] ?>"/></td>
                <td colspan="2" height="40px"><input type="text" name="english" size="10" height="40px" value="<?php echo $info['english'] ?>"/></td>

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

