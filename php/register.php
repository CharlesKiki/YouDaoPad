<?php 
    session_start(); 
    $username = $_REQUEST["username"]; 
    $password = $_REQUEST["password"]; 
  	$email    = $_REQUEST["email"]; 


    $dbusername=null; 
    $dbpassword=null;
    //这里是对登陆数据库的密码设置
    $result=mysqli_query($con,"select * from user where username ='{$username}';"); 
    //这里需要针对数据库内部的row进行查询
    if (!$result) {
			printf("Error: %s\n", mysqli_error($con));
			exit();
		}
    while ($row=mysqli_fetch_array($result)) { 
		$dbusername=$row["username"]; 
		$dbpassword=$row["password"];  
    } 
    if(!is_null($dbusername))
    { 

    } 
    //检查用户名重复功能结束
    $id=mysqli_insert_id($con);
    mysqli_query($con,"insert into user (id,username,password,email) values('$id','$username','$password','$email')") or die("存入数据库失败".mysqli_error($con)) ; 
    mysqli_close($con); 
    //关闭SQL连接
?> 
