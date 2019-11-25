<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>明德书院学时系统</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="./css/materialize.css">
   <!-- <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">-->
    <link rel="stylesheet" href="./css/main.css">
    <link href="./img/nav_favicon.png" rel="icon" type="image/png" sizes="272x272">
    <script src="./js/materialize.js"></script>
    <script src="./js/main.js"></script>
    <script src="./js/jquery.js"></script>
    <script src="./js/jquery.form.js"></script>
    <script>
        M.AutoInit();
        window.setInterval(uptime, 1000);
    </script>
    <style>
        #num{
            font-size: 200px;
        }
        .apply{
            width:100%;
            height:50%;
            font-size:50%;
            line-height:300%;
            background-color:#1e286e;
            border-radius:5px;
            color:white;
            text-align:center;
        }
        .fms{
            width:33.33%;
            height:100%;
            margin-left:0%;
            float:left;

        }
        table, th, td {
            background-color:#ffffff;
            border:1px solid auto;
        }
    </style>
</head>

<body class="grey lighten-3">
    <nav id="container" style="background-color:#1E286E">
        
        <div class="nav-wrapper darken-1" style="background-color:#1E286E">
            <a href="#" class="brand-logo titletxt" style="width:200px;font-size: 25px;">明德书院学时系统</a>
            
                    <?php
                    error_reporting(0);
                    $e=0;
                    try{
                        if($_POST["username"]){
                            $name=$_POST["username"];
                            $hours=$_POST["hours"];
                            $num=$_POST["num"];
                            $click="$('#set').submit()";
                            echo "<form id='set'action='setting.php' method='POST' style='display:inline'>";
                            echo "<p onclick=$click style='font-size: 20px;font-weight: 350;position:absolute;top:-20px;right:100px'>修改密码</p>";
                            echo "<input type='text' style='display:none' name='num' value='$num'/>";
                            echo "<input name='name' style='display:none' value='$name'/>";
                            echo "<input name='hours' style='display:none' value='$hours'/>";
                            echo "</form>";

                            echo "<p id='user' style='margin:0;font-size: 20px;right:10px'><b>$name</b></p>";
                            $e=1;
                        }
                        else $e=0;
                    }
                    finally{
                        if($e==0) echo '<a id="user" href="./login.html" style="font-size: 24px;font-weight: 350;position:absolute;right:10px"><b>登录</b></a>';
                    }
                    ?>
             
        </div>
    </nav>
    <div id="show">
            <?php
            $num=0;
                try{
                    if($e==1&&$name!="admin"){
                        include_once "dbpwd.php";
                        $conn = mysqli_connect("127.0.0.1:3306", "root", $dbpwd);
                        mysqli_query($conn, "use mingde");
                        $num=$_POST['num'];
                        $sql="select * from info where id=$num";
                        $res=mysqli_query($conn,$sql);
                        $row=mysqli_fetch_row($res);
                        echo '<h1 style="text-align:center">您的总学时为</h1>';
                        $hours=$row[3];
                    }
                    else if($name!="admin"){
                        echo '<h1 style="text-align:center">您好，请先注册或登录</h1>';
                    }
                }
                finally{

                }
            ?>
        <div id="num" class="mingde-text" style="text-align:center;font-size:200px;color:#1e286e">
            <?php
                if($e==1&&$name!="admin"){
                    echo $hours;
                }
            ?>
        </div>
    </div>
    <div style="text-align:center;width:<?php if($e==0||$name=="admin") echo '80%;';else echo '60%;';?>;margin:0 auto;">
    <br />
    <form id="aform" class="fms" action="apply.php" method="POST">
        <input name="num" type="text" style="display:none" value="<?php echo $num?>"/>
        <input name="name" type="text" style="display:none" value="<?php echo $name?>"/>
        <input class="apply" style="<?php if($e==0||$name=="admin") echo 'display:none'?>" value="申报学时" type="submit" />
    </form>
    <form id="hform" class="fms" action="handle.php" method="POST">
        <input name="name" type="text" style="display:none" value="<?php echo $name?>"/>
        <input class="apply" style="<?php if($e==0||$name!="admin") echo 'display:none'?>" value="处理申请" type="submit" />
    </form>
    <form id="uform" class="fms" action="announce.php" method="POST">
        <input name="num" type="text" style="display:none" value="<?php echo $num?>"/>
        <input name="name" type="text" style="display:none" value="<?php echo $name?>"/>
        <input class="apply" style="<?php if($e==0||$name!="admin") echo 'display:none'?>" value="发布通知" type="submit" />
    </form>
    <form id="nform" class="fms" action="notice.php" method="POST">
        <input name="num" type="text" style="display:none" value="<?php echo $num?>"/>
        <input name="name" type="text" style="display:none" value="<?php echo $name?>"/>
        <input class="apply" style="<?php if($e==0) echo 'display:none'?>" value="处理结果" type="submit" />
    </form>
    <form id="nform" class="fms" action="ranking.php" method="POST">
        <input class="apply" style="<?php if($e==0) echo 'display:none'?>" value="排行榜" type="submit" />
    </form>
    </div>
    <br />
    <table id="list" border="1" style="border:1;<?php if($e==0||$name!="admin") echo 'display:none'?>">
        <?php
            $e = 0;
            error_reporting(0);
            include_once "dbpwd.php";
            $conn = mysqli_connect("127.0.0.1:3306", "root", $dbpwd);
            mysqli_query($conn, "use mingde");
            $sql="select * from info";
            $res=mysqli_query($conn,$sql);
        ?>
        <tr>
            <td>
                学号
            </td>
            <td>
                姓名
            </td>
            <td>
                学时
            </td>
            <?php 
                $i=0;
                $j=1;
                try{
                    while($row=mysqli_fetch_row($res)){
                        if($name!="admin") break;
                        if($row[0]<1000000) continue;
                        echo "<tr>";
                        echo "<td>".$row[0]."</td>";
                        echo "<td>".$row[1]."</td>";
                        echo "<td>".$row[3]."</td>";
                        echo "</tr>";
                    }            
                }
                finally{

                }
                mysqli_close($conn);
            ?>
        </tr>
    </table>
    <script>
        var w=document.documentElement.clientWidth;
        var user=document.getElementById("user");
        user.style.position="absolute";
        user.style.left=w-100;
    </script>
</body>

</html>
