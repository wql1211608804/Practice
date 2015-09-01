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
        <!--<b>this is message.php</b>-->
        <?php
        $conn=mysqli_connect("localhost", "root", "cntysoft");
        if(!$conn){
            die('Could not connect: '. mysqli_error($conn));
                }
        $username=$_POST['username'];
        $userpwd=$_POST['userpwd'];
        $userrole=$_POST['userrole'];
        $query0="select * from user where userName='$username' and userPwd='$userpwd' and userRole='$userrole'";
//      echo $query0;
        mysqli_select_db($conn,"mytest");
        $result_row=  mysqli_fetch_array(mysqli_query($conn,$query0));
//        echo count($result);
          if(count($result_row)!=0){
              if($userpwd=="888888"){
                  echo "你的密码已被重置请修改密码：";                  ?>
        <form action="login.php" method="post">
            <input type="hidden" name="oldname" value="<?php echo $username;?>">
            新&nbsp;&nbsp;密&nbsp;&nbsp;码：<input type="password" name="userpwd" > <br>
            在输一遍：<input type="password" name="userpwd2" ><br>
            <input type="submit" style="text-align: center" value="修改">
        </form>
        <a href="login.php">登陆</a>
        <?php
              }  else {
                    session_start();
                    $_SESSION['Id']=$result_row['userId'];
                    $_SESSION['Name']=$result_row['userName'];
                  if($userrole==0){                    
                    $query1="select * from message where userId='".$_SESSION['Id']."' order by messageTime";
                    $result=mysqli_query($conn,$query1);
                    echo "<p style='text-align: center'>Welcome $username"," 使用留言板</p><br>";
                    echo "<p style='text-align: center'><a href='addMessage.php' >留言</a>&nbsp;&nbsp;<a href='publicMessage.php' >公共留言</a>&nbsp;&nbsp;<a href='index.php' >退出</a></p>";
                    $count=1;
                    echo "<table style='text-align: center;' border='1'><tr><th colspan='3'>我的留言板</th></tr><tr><th>编号</th><th>内容</th><th>时间</th></tr>";
                    while ($row = mysqli_fetch_array($result)) {
                        echo "<tr><td>$count</td><td>".$row['messageContent']."</td><td>".$row['messageTime']."</td></tr>";
                        $count++;                      
                    }
                    echo "</table>";
            }  else {
                echo "<h3 style=\"text-align: center\">欢迎管理员 $username"," 登陆</h3><br>";
                echo "<p style='text-align: center'><a href='user_manage.php' >用户管理</a>&nbsp;&nbsp;<a href='message_manage.php' >留言管理</a>&nbsp;&nbsp;<a href='index.php' >退出</a></p>";
            }
              }
                 
            }else {
            echo "用户名与密码不匹配!<a href='login.php' >重新登陆</a>";
        }
        mysqli_close($conn);
        ?>
    </body>
</html>
