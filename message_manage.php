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
        echo "<h3 style=\"text-align: center\">欢迎管理员 ".$_SESSION['Name']." 进入留言管理</h3><br>";
        echo "<p style='text-align: center'><a href='user_manage.php' >用户管理</a>&nbsp;&nbsp;<a href='index.php' >退出</a></p>";
        $conn=mysqli_connect("localhost", "root", "cntysoft");
         if(!$conn){
            die('Could not connect: '. mysqli_error($conn));
                }
         mysqli_select_db($conn,"mytest");
//         删除操作
         if($_SERVER["REQUEST_METHOD"]=="POST"){
             if($_POST['op']==1){
                 $query1="delete from message where messageId='".$_POST['del_messageId']."'";
             $stmt1=new mysqli_stmt($conn,$query1);
//             echo $query0;
             if (mysqli_execute($stmt1)){
                 echo "删除成功！";
             }  else {
                 echo "数据库操作错误，删除失败！";
             }       
             
         }
//         elseif ($_POST['op']==2) {
//                 $query2="update user set userPwd='888888' where userId='".$_POST['mod_userId']."'";
//             $stmt1=new mysqli_stmt($conn,$query2);
////             echo $query0;
//             if (mysqli_execute($stmt1)){
//                 echo "重置成功！";
//             }  else {
//                 echo "数据库操作错误，删除失败！";
//             }  
//            }
         
             }
         $query="select * from message";
         $result=mysqli_query($conn, $query);
         $count=1;
        echo "<table style='text-align: center' border='1'><tr><th colspan='5'>留言列表</th></tr><tr><th>编号</th><th>内容</th><th>留言时间</th><th>留言人</th><th>操作</th></tr>";
        while ($row = mysqli_fetch_array($result)) {
             $name="";
             $query2="select userName from user where userId='".$row['userId']."'";
             $name=  mysqli_fetch_array(mysqli_query($conn, $query2))['userName'];            
            echo "<tr><td>$count</td><td>".$row['messageContent']."</td><td>".$row['messageTime']."</td><td>$name</td>"
                    . "<td><form action='message_manage.php' method='post'>"
                    . "<input type='hidden' name='op' value='1'>"
                    . "<input type='hidden' name='del_messageId' value='".$row['messageId']."'>"
                    . "<input type='submit' value='删除'></form>"
                    . "</td></tr>";
            $count++;                      
        }
        echo "</table>";
        ?>
    </body>
</html>
