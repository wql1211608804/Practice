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
        // put your code here
//        echo $_SESSION['Id'];
         echo "<p style='text-align: center'>Welcome ";
         echo $_SESSION['Name'];
         echo " 使用留言板</p><br>";
         echo "<p style='text-align: center'><a href='addMessage.php' >留言</a>&nbsp;&nbsp;"
                    . "<a href='messageBoard.php' >我的留言</a>&nbsp;&nbsp;<a href='index.php' >退出</a></p>";
         $conn=mysqli_connect("localhost", "root", "cntysoft");
         if(!$conn){
            die('Could not connect: '. mysqli_error($conn));
                }
         mysqli_select_db($conn,"mytest");
         $query1="select * from message  order by messageTime";
         $result=mysqli_query($conn,$query1);
         $count=1;
        echo "<table style='text-align: center' border='1'><tr><th colspan='4'>我的留言板</th></tr><tr><th>编号</th><th>内容</th><th>留言人</th><th>时间</th></tr>";
        while ($row = mysqli_fetch_array($result)) {
            $name="";
            if($row['userId']!=$_SESSION['Id']){
                $query2="select userName from user where userId='".$row['userId']."'";
                $name=  mysqli_fetch_array(mysqli_query($conn, $query2))['userName'];
            }  else {
                $name=$_SESSION['Name'];
            }
            echo "<tr><td>$count</td><td>".$row['messageContent']."</td><td>".$name."</td><td>".$row['messageTime']."</td></tr>";
            $count++;                      
        }
        echo "</table>";
        ?>
    </body>
</html>
