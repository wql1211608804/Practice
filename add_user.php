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
        // put your code here
        function test_input($data) {
            $data=  trim($data);
            $data=  stripslashes($data);
            $data=  htmlspecialchars($data);
            return $data;
}
         session_start();
        echo "<h3 style=\"text-align: center\">欢迎管理员 ".$_SESSION['Name']." 进入用户管理</h3><br>";
        $nameErr=$pwdErr=$pwd2Err="";
        $name=$pwd=$registeInfo="";
        if($_SERVER["REQUEST_METHOD"]=="POST"){
            if(empty($_POST["username"])){
                $nameErr="请输入帐号";
            }  else {
                $name=  test_input($_POST["username"]);
            }
            if(empty($_POST["userpwd"])){
                $pwdErr="请输入密码";                
            }else {
                if(empty($_POST["userpwd2"])){
                    $pwd2Err="请重复密码";
                }elseif (test_input($_POST["userpwd"])==  test_input($_POST["userpwd2"])) {
                     $pwd=  test_input($_POST["userpwd"]);      
                }else {
                $pwd2Err="密码不一致";
                } 
            }
            if(strlen($name)>0&&  strlen($pwd)>0){
                $conn=  mysqli_connect("localhost", "root", "cntysoft");
                if(!$conn){
                    die("Couldn't connect".mysqli_error($conn));
                }
                mysqli_select_db($conn, "mytest");
                $query="select userId from user where userName='$name'";
//                echo $query;
                $result=  mysqli_query($conn, $query);
                $result_row=  mysqli_fetch_array($result);
                if(count($result_row)!=0){
                    $registeInfo="帐号已被注册！";                    
                }  else {
                    $sql2="";
                       if ($_POST['userRole']==0) {
                        $sql2="Insert into user(userName,userPwd) values('$name','$pwd')";
                    }  else {
                        $sql2="Insert into user(userName,userPwd,userRole) values('$name','$pwd','1')";
                    }                    
//                    echo $sql2; 
//                    var_dump($sql2);exit;
                    $stmt = new mysqli_stmt($conn, $sql2);
                    if(mysqli_execute($stmt)){
                         $registeInfo="添加成功！";
                    }  else {
                        $registeInfo="添加失败！";
                    }
                   
                }
                mysqli_close($conn);
            }
            
            
        }
        ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            帐&nbsp;&nbsp;号：<input type="text" name="username"><span class="error">*<?php echo $nameErr;?></span> <br>
            密&nbsp;&nbsp;码：<input type="password" name="userpwd" ><span class="error">*<?php echo $pwdErr;?></span> <br>
            在输一遍：<input type="password" name="userpwd2" ><span class="error">*<?php echo $pwd2Err;?></span> <br>
            角&nbsp;&nbsp;色:<input type="radio" name="userRole" value="0" checked>普通用户&nbsp;&nbsp;
            <input type="radio" name="userRole" value="1" >管理员<br>
            <input type="submit" style="text-align: center" value="添加">
        </form>
        <a href="user_manage.php">返回</a>&nbsp;&nbsp;<?php echo "$registeInfo";?>
        
    </body>
</html>
