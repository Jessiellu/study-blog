<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/11/10
 * Time: 8:47
 */
//数据库配置信息
$db_info=array(
    'db_host'=>'127.0.0.1',
    'db_user'=>'root',
    'db_pwd'=>'password',
    'db_name'=>'student_score',
    'db_charset'=>'utf8',
    'db_port'=>'3306'
);

//1.连接数据库
$link=mysql_connect($db_info['db_host'],$db_info['db_user'],$db_info['db_pwd']);

if (!$link)
{
    die('could not connect'.mysql_error());
}

//echo 'connect successfully';

//2.选择数据库
mysql_select_db($db_info['db_name']) or die('cannot use student_score'.mysql_error());

//3.设置下字符编码
mysql_set_charset($db_info['db_charset']);

?>