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
        <script type="text/javascript" src="jquery.js"></script>
        <script type="text/javascript">
           $('document').ready(function (){
              for(var i=0;i<10000;i++){
                 $('body').append(i);
//                 window.location='/';
              }
              $('button').click(function (){
                 $('div').removeData();
                 setTimeout(function(){
                    $('div').append('健康觉得')
                 },1000)
                 
                 $('#in').val('')
              })

           });
        </script>
        <style>
            .choseAll{              
            }
            .choseItem{                
            }
        </style>
    </head>

    <body><?php
//        $str = "dskfjlksdjfjsl da;jfsdjflsj dfkjsdlkjfkjsdfjksjdfk jsfjlskjdfjskd";
//        $str1 = "开始的疯狂老师地方啦福克斯开发建设的空间福克斯看就是的疯狂时间的浪费就是看就是";
//        echo 'iconv_strlen:str ' . iconv_strlen($str) . ':str1 ' . iconv_strlen($str1) . '<br>strlen:str ' . strlen($str)
//        . ':str1 ' . strlen($str1) . '<br>mb_strlen:str' . mb_strlen($str) . 'str1: ' . mb_strlen($str1) . '<br>';
        $a = '5';
        switch ($a) {
           case 1: echo 'a=' . $a;
              break;
           case 2: echo 'a=' . $a;
              break;
           default :echo 'a!=1&&a!=2';
              break;
        }
        ?>
        <br>
        <input id="in" name="sd" placeholder="输入">
        <a href="login.php">登陆</a><br>
        <a href="register.php">注册</a><br>
        <div>kjkd</div>
        <button>guess&gt;&nbsp;</button>
        <?php
        $array = array('name' => '王网网', 'phone' => '18224217896', 'address' => '立刻就死了的福克斯的旅客发送看到');
        $array1 = array('type' => '纸质', 'content' => '购买了商品', 'title' => '个人发票');
        $sd = '?';
        var_dump(unserialize('s:40:"a:2:{i:0;s:6:"白色";i:1;s:6:"萨达";}";'));
        ?>
    </body>
</html>
