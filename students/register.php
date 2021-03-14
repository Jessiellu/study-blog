<html>
<head>
    <meta charset="UTF-8"/>
    <title>注册</title>
    <style type="text/css">
        body{
            background-repeat: no-repeat;
            background-size: 100%;
        }
        #title01{
            background-color: rgba(0,190,231,0.1);
            font-size: 30px;
            font-family: 'Microsoft JhengHei';
            color: rgb(98,94,91);
        }
        #title02{
            background-color: rgba(0,190,231,0.1);
        }
        form{
            margin: 35px auto;
            padding: 30px;
            box-shadow: 1px 1px 2px 1px #aaaaaa;
            border-radius: 3px;
            width: 280px;
            height: 360px;
        }
        #user{
            margin: 10px;
        }
        #pwd{
            margin: 10px;
        }
        #set1{
            margin-left: 10px;
            padding: 10px;
        }
        #reset1{
            margin-right: 10px;
            padding: 10px;
        }
        form{
            background-color: rgb(255,255,255);
        }
    </style>
    <script type="text/javascript">
        function checkit(form1) {
            if (form1.user.value=="")
            {
                alert("请输入帐号！");
                return false;
            }
            if (form1.pwd.value=="")
            {
                alert("请输入密码！");
                return false;
            }
            return true;
        }
    </script>
    <?php
    //引入数据库文件
    require_once 'db_connect.php';
    //获取界面上用户输入的用户名和密码 插入数据库
    if (isset($_POST['submit1']))
    {
        $username=$_POST['user'];
        $password=$_POST['pwd'];

        //echo $username;
        //echo $password;
        $sql="insert into user_info(username,password) values ('{$username}','{$password}')";
        $results=mysql_query($sql);
        //注册成功，返回登录界面登录
        if ($results)
        {
            if (mysql_affected_rows()==1)

        ?>
        <script type="text/javascript">
            alert("注册成功，正在返回登录界面...");
            window.location.href="login_in.php";
        </script>
        <?php
        }
        else
        {
        ?>
            <script type="text/javascript">
                alert("注册失败！");
                history.back();
            </script>
            <?php
        }
    }

    ?>
</head>
<body background="image/0.jpg">

    <div id="title01" align="center">学生成绩管理系统</div>
    <form action="#" name="form1" method="post">
        <div id="title02">
            <p style="font-size: 28px">
                <img src="image/r01.jpg" width="30px" height="30px">
                <b>注册</b>
            </p>
        </div>
        <div>
            <div>
                <span>账号:</span>
                <input type="text" id="user" name="user" placeholder="请输入6位帐号" size="20" style="box-shadow: none;border-radius: 3px;line-height: 20px;width: 200px"/>
            </div>
            <div>
                <span>密码:</span>
                <input type="password" id="pwd" name="pwd" placeholder="请输入8位密码" size="20" style="box-shadow: none;border-radius: 3px;line-height: 20px;width: 200px;"/>
            </div>
            <div align="center">
                <input type="reset" id="reset1" value="重置" style="height: 36px;border: 1px;background-color: #00bee7;color: #fff;width: 72px;border-radius: 3px;"/>
                <input type="submit" id="set1" name="submit1" value="提交" style="height: 36px;border: 1px;background-color: #00bee7;color: #fff;width: 72px;border-radius: 3px;" onclick="return checkit(form1)"/>

                <div align="right" name="return1">
                    <p style="font-size: 12px;">已有帐号？<a href="login_in.php"><img src="image/l01.jpg" width="36px" height="36px"></a></p>
                </div>
            </div>
            <div>
                <p style="color: rgb(128,138,135);font-size: 12px;margin-top: 30px;"><b>*</b>帐号为学生学号或教师工号</p>
                <p style="color: rgb(128,138,135);font-size: 12px;"><b>*</b>密码请随意设置成自己喜欢的8位数字</p>
            </div>

        </div>
    </form>
</body>
</html>

