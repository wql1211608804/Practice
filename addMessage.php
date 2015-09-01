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
        echo "<p style='text-align: center'>Welcome ";echo $_SESSION['Name'];echo " 使用留言板</p><br>"; 
        ?>
        <form action="messageBoard.php" method="post" >
            留言区域：<textarea name="content" ></textarea>
            <input type="submit" value="留言">
        </form>
    </body>
</html>
