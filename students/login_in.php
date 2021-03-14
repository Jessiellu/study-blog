<html>
<head>
    <meta charset="UTF-8">
    <title>登录</title>
    <style type="text/css">
        input{
            margin: 10px;
        }
        form{
            margin: 35px auto;
            padding: 30px;box-shadow: 1px 1px 2px 1px #aaaaaa;
            border-radius: 3px;
            width: 380px;
        }
        #bidTitle{
            background-color: rgba(0,190,231,0.1);
            height: 40px;
            font-size: 30px;
            font-family: 'Microsoft JhengHei';
            color: rgb(98,94,91);
        }
        #idTitle{
            font-size: 25px;
            font-family: 'Adobe 黑体 Std R';
            color: #00ffff;
        }
        a:link{color: blue;}
        a:visited{color: purple;}
        .loginButton{
            height: 36px;
            border: 1px;
            background-color: #00bee7;
            color: #fff;
            width: 72px;
            border-radius: 3px;
        }
    </style>
    <script type="text/javascript">
        function checkit(content) {
            if (content.stu.value=="")
            {
                alert("请输入帐号！");
                return false;
            }
            if (content.pwd.value=="")
            {
                alert("请输入密码！");
                return false;
            }
            return true;
        }
    </script>
<?php
    session_start();
    //引入链接数据库的模板文件
    require_once 'db_connect.php';

    //获取用户信息
    if (isset($_POST['stu']) && isset($_POST['pwd']))
    {
        $stu=$_POST['stu'];
        $pwd=$_POST['pwd'];

        //获取数据库的账号和密码
        $sql="select * from user_info where username='$stu' and password='$pwd'";
        $results=mysql_query($sql);//执行一条 MySQL 查询
        //mysql_query(query,connection)
        //    query	必需。规定要发送的 SQL 查询。注释：查询字符串不应以分号结束。
        //  connection	可选。规定 SQL 连接标识符。如果未规定，则使用上一个打开的连接。
        $msg=mysql_fetch_assoc($results);//从结果集中取得一行作为关联数组。
        //mysql_fetch_assoc(data)
        //data	必需。要使用的数据指针。该数据指针是从 mysql_query() 返回的结果。
        //echo $msg['username'];
        //echo $msg['password'];
        $_SESSION['username']=$msg['username'];
        $_SESSION['id']=$msg['id'];
        if ($stu == $msg['username'] && $pwd==$msg['password'])
        {

            if ($msg['id']==1)
            {
                //是管理员
                //弹出登录成功
            ?>
                <script type="text/javascript">
                    alert("管理员登录成功！");
                    window.location.href="index.php";
                </script>

            <?php
            }
            if ($msg['id']==0)
            {
                //普通用户登录
                //弹出登录成功
            ?>
                <script type="text/javascript">
                    alert("普通用户登录成功！");
                    window.location.href="indexs.php";
                </script>
            <?php
            }

        }
    }
    if ($stu != $msg['username'] || $pwd!=$msg['password'])
    {//弹出登录失败
        ?>
        <script type="text/javascript">
            alert("登录失败！账号或密码出错？");
            window.location.href="login_in.php";
        </script>
        <?php

    }
    ?>

</head>
<body>
<div id="bidTitle" align="center">学生成绩管理系统</div>
<form name="content" action="#" method="post">
    <div id="idTitle" align="center">用户登录</div>
    <div id="logCon" align="center">
        <div class="line">
            <span>帐号</span>
            <input placeholder="请输入6位账号" name="stu" tabindex="1" type="text" style="box-shadow: none;line-height: 26px;width: 240px;border-radius: 3px;"/>
        </div>

        <div class="line">
            <span>密码</span>
            <input placeholder="请输入密码" name="pwd" tabindex="2" type="password" style="box-shadow: none;line-height: 26px;width: 240px;border-radius: 3px;">
        </div>
        <button type="submit" class="loginButton" value="登录" onclick="return checkit(content)">登录</button>
        <div><p style="font-size: 12px">没有帐号？<a href="register.php">去注册</a></p></div>
    </div>

</form>
</body>
</html>