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
        echo "Hello !This is a new page";
        $conn=mysqli_connect("localhost", "root", "cntysoft");
        if(!$conn){
            die('Could not connect: '.  mysqli_error($conn));
                }
        else {
                    echo "连接成功！";
             }
        $createdb="CREATE DATABASE mytest";//创建数据库
        IF (mysqli_query( $conn,$createdb)) {
            echo 'DB CREATED';
        } else {
            echo 'Error creating database'.  mysqli_error($conn);
        }
        mysqli_select_db($conn,"mytest");
        /*mysql_query("Insert into user(userName, userPwd, userRole) 
VALUES ('admin', 'wql', '1')");*/
        mysqli_close($conn);
        ?>
    </body>
</html>
