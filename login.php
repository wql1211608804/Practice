<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body><?php
        if($_SERVER["REQUEST_METHOD"]=="POST"){
            $conn=mysqli_connect("localhost", "root", "cntysoft");
         if(!$conn){
            die('Could not connect: '. mysqli_error($conn));
                }
         mysqli_select_db($conn,"mytest");
         if (strlen($_POST['userpwd'])==strlen($_POST['userpwd2'])&&$_POST['userpwd']==$_POST['userpwd2']&&$_POST['userpwd']!="") {
             if($_POST['userpwd']=='888888'){
                 echo "修改失败，新密码与默认相同或值为零";
             }  else {
                 $query="update user set userPwd='".$_POST['userpwd']."' where userName='".$_POST['oldname']."'";
             $stmt=new mysqli_stmt($conn,$query);
             if (mysqli_execute($stmt)){
                 echo "修改成功，请重新登陆！";
             }
             }
             
         }  else {
             echo "修改失败，密码为空或者密码不一致！";
         }
         mysqli_close($conn);
        }
        
         
    ?>
        <!--<b>this is login.php</b>-->
        <form action="loginCheck.php" method="post">
            帐号：<input type="text" name="username"><br>
            密码：<input type="password" name="userpwd" ><br>
            <input type="radio" name="userrole" value="0" checked>用户
            <input type="radio" name="userrole" value="1">管理员<br>
            <input type="submit" value="登陆">
        </form>&nbsp;&nbsp;
        <a href="index.php">首页</a>
    </body>
</html>
