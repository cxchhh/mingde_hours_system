<?php
    $e = 0;
    error_reporting(0);
    include_once "dbpwd.php";
    $conn = mysqli_connect("127.0.0.1:3306", "root", $dbpwd);
    mysqli_query($conn, "use mingde");
    $sql="select * from application order by id desc limit 0,1000";
    $res=mysqli_query($conn,$sql);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <!--<meta http-equiv="refresh" content='1;url=./index.php' />-->
    <script src="./js/jquery.js"></script>
    <script src="./js/jquery.form.js"></script>
    <link rel="stylesheet" href="./css/materialize.css">
    <link rel="stylesheet" href="./css/main.css">
    <title>处理申报</title>
    <style>
        .msg{
            width:80%;
            padding:20px;
            position:relative;
            word-wrap: break-word;
            word-break: normal;
            left:10%;
            border-radius:10px;
            background-color:rgba(255,255,255,0.5);
        }
    </style>
</head>
<body style="background-color:rgba(30,40,110,0.9);">
    <div>
        <br />
        <br />
        <?php 
            $i=0;
            try{
            if($_POST["name"]!="admin"){
                echo "<h1 style='text-align:center;color:white'>权限不足，请用管理员帐号登录</h1>";
            }
            else{
            while($row=mysqli_fetch_row($res)){
                $e=1;
                echo "<div class='msg' style='font-size:20px;top:$i"."px'><b>";
                echo $row[2];
                echo "</b>  申报学时：<i>";
                echo $row[4];
                echo "</i> 申报原因：<br />";
                echo $row[3];
                echo "<br /><form action='handler.php' method='POST' style='display:inline'>";
                echo "<input style='display:none' name='idx' value='$row[0]'/>";
                echo "<input style='display:none' name='num' value='$row[1]'/>";
                echo "<input style='display:none' name='name' value='$row[2]'/>";
                echo "<input style='display:none' name='msg' value='$row[3]'/>";
                echo "<input style='display:none' name='hours' value='$row[4]'/>";
                echo "<input style='display:none' name='res' value='1'/>";
                echo "<input type='submit' style='color:green;font-size=30px' value='通过' />";
                echo "<input style='display:none' type='text' name='reason'/></form>&nbsp;&nbsp&nbsp;";

                echo "<form action='handler.php' method='POST' style='display:inline'>";
                echo "<input style='display:none' name='idx' value='$row[0]'/>";
                echo "<input style='display:none' name='num' value='$row[1]'/>";
                echo "<input style='display:none' name='name' value='$row[2]'/>";
                echo "<input style='display:none' name='msg' value='$row[3]'/>";
                echo "<input style='display:none' name='hours' value='$row[4]'/>";
                echo "<input style='display:none' name='res' value='0'/>";
                echo "<input type='submit' style='color:red;font-size=30px' value='拒绝' /><br />";
                echo "<input style='background-color:white;color:black;position:relative;top:10px'type='text' name='reason' placeholder='拒绝原因' required/></form>";
                echo "</div>";
                $i=$i+30;
            }
            if($e==0) echo "<h1 style='text-align:center;color:white'>暂无记录</h1>";
        }
    }finally{

    }
            mysqli_close($conn);
        ?>
    </div>
    <script>
        
    </script>

</body>
</html>