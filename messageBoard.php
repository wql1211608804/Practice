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
//        echo session_status();
        session_start();
        // put your code here
//        echo $_SESSION['Id'];
         echo "<p style='text-align: center'>Welcome ";
         echo $_SESSION['Name'];
         echo " 使用留言板</p><br>";
         echo "<p style='text-align: center'><a href='addMessage.php' >留言</a>&nbsp;&nbsp;"
                    . "<a href='publicMessage.php' >公共留言</a>&nbsp;&nbsp;<a href='index.php' >退出</a></p>";
         $conn=mysqli_connect("localhost", "root", "cntysoft");
         if(!$conn){
            die('Could not connect: '. mysqli_error($conn));
                }
         mysqli_select_db($conn,"mytest");
         if($_SERVER["REQUEST_METHOD"]=="POST"){
             if(strlen($_POST['content'])!=0){
                 $query0="INSERT into message(messageContent,userId) values('".$_POST['content']."','".$_SESSION['Id']."')";
             $stmt=new mysqli_stmt($conn,$query0);
//             echo $query0;
             if (mysqli_execute($stmt)){
                 echo "成功留言！";
             }  else {
                 echo "留言失败！";
             }
             }  else {
                 echo "内容为空，留言失败！";
             }
             
         }
         $query1="select * from message where userId='".$_SESSION['Id']."' order by messageTime";
         $result=mysqli_query($conn,$query1);
         $count=1;
        echo "<table style='text-align: center' border='1'><tr><th colspan='4'>我的留言板</th></tr><tr><th>编号</th><th>内容</th><th>留言人</th><th>时间</th></tr>";
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr><td>$count</td><td>".$row['messageContent']."</td><td>".$_SESSION['Name']."</td><td>".$row['messageTime']."</td></tr>";
            $count++;                      
        }
        echo "</table>";
        ?>
        
       
    </body>
</html>
