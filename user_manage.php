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
    <body>
        <?php
        session_start();
        echo "<h3 style=\"text-align: center\">欢迎管理员 ".$_SESSION['Name']." 进入用户管理</h3><br>";
        echo "<p style='text-align: center'><a href='message_manage.php' >留言管理</a>&nbsp;&nbsp;<a href='index.php' >退出</a></p>";
         $conn=mysqli_connect("localhost", "root", "cntysoft");
         if(!$conn){
            die('Could not connect: '. mysqli_error($conn));
                }
         mysqli_select_db($conn,"mytest");
         if($_SERVER["REQUEST_METHOD"]=="POST"){
             if($_POST['op']==1){
             if($_POST['del_userId']!=$_SESSION['Id']){
                 $query0="delete from user where userId='".$_POST['del_userId']."'";
                 $query1="delete from message where userId='".$_POST['del_userId']."'";
             $stmt=new mysqli_stmt($conn,$query0);
             $stmt1=new mysqli_stmt($conn,$query1);
//             echo $query0;
             if (mysqli_execute($stmt)&&  mysqli_execute($stmt1)){
                 echo "删除成功！";
             }  else {
                 echo "数据库操作错误，删除失败！";
             }
             }  else {
                 echo "用户正在使用，删除失败！";
             }
             
         }elseif ($_POST['op']==2) {
                 $query2="update user set userPwd='888888' where userId='".$_POST['mod_userId']."'";
             $stmt1=new mysqli_stmt($conn,$query2);
//             echo $query0;
             if (mysqli_execute($stmt1)){
                 echo "重置成功！";
             }  else {
                 echo "数据库操作错误，删除失败！";
             }  
            }
         
             }
         $query="select * from user";
         $result=mysqli_query($conn, $query);
         $count=1;
        echo "<table style='text-align: center' border='1'><tr><th colspan='4'>用户列表</th></tr><tr><th>编号</th><th>用户名</th><th>角色</th><th>操作<a href='add_user.php'>+</a></th></tr>";
        while ($row = mysqli_fetch_array($result)) {
            if($row['userRole']==1){
                echo "<tr><td>$count</td><td>".$row['userName']."</td><td>管理员</td><td>删除</td></tr>";
            }  else {
                echo "<tr><td>$count</td><td>".$row['userName']."</td><td>用户</td>"
                        . "<td><form action='user_manage.php' method='post'>"
                        . "<input type='hidden' name='op' value='1'>"
                        . "<input type='hidden' name='del_userId' value='".$row['userId']."'>"
                        . "<input type='submit' value='删除'></form>"
                        . "<form action='user_manage.php' method='post'>"
                        . "<input type='hidden' name='op' value='2'>"
                        . "<input type='hidden' name='mod_userId' value='".$row['userId']."'>"
                        . "<input type='submit' value='重置密码'></form></td></tr>";
            }            
            $count++;                      
        }
        echo "</table>";
       
        // put your code here
        ?>
        <!--<form action=’user_manage.php?del_userId=".$row['userId']."‘ method="post"><input type="submit" value="删除"></form>-->
    </body>
</html>
