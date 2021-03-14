<?php
//先获取当前要删除的留言id
if(isset($_GET['id']) && !empty($_GET['id'])){
    $id =$_GET['id'];
}else{
    //若没有传入id参数，直接跳转到首页
    header("Location:select_te.php");
}

//执行数据库删除操作
require_once "db_connect.php";
$sql="delete from stu_info  where id =($id)";
$result =mysql_query($sql);
if($result ==true){
    echo <<<STR
    <script type="text/javascript">
    alert("record delete succeed!");
    window.location.href="select_te.php";
    </script>
STR;
    exit;
}else{
    echo <<<STR
    <script type="text/javascript">
    alert("record delete failed!");
    window.location.href="select_te.php";
    </script>
STR;
    exit;
}
mysql_close();

?>

