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
            session_start();
            session_destroy();    
            ?>
        <a href="login.php">登陆</a><br>
        <a href="register.php">注册</a><br>
    </body>
</html>
