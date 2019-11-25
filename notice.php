<?php
    $e = 0;
    $num=$_POST["num"];
    $name=$_POST["name"];
    error_reporting(0);
    include_once "dbpwd.php";
    $conn = mysqli_connect("127.0.0.1:3306", "root", $dbpwd);
    mysqli_query($conn, "use mingde");
    if($name=="admin") $sql="select * from msgs order by id desc limit 0,1000";
    else $sql="select * from msgs where num=$num order by id desc limit 0,1000";
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
    <title>处理信息</title>
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
                while($row=mysqli_fetch_row($res)){
                    $e=1;
                    echo "<div class='msg' style='font-size:20px;top:$i"."px'>";
                    echo strip_tags($row[2],"<i><br><b>");
                    echo "</div>";
                    $i=$i+30;
                }
                if($e==0) echo "<h1 style='text-align:center;color:white'>暂无记录</h1>";
            
         }
         finally{

        }
            mysqli_close($conn);
        ?>
    </div>
    <script>
        
    </script>

</body>
</html>