<?php
    $e = 0;
    error_reporting(0);
    include_once "dbpwd.php";
    $conn = mysqli_connect("127.0.0.1:3306", "root", $dbpwd);
    mysqli_query($conn, "use mingde");
    $sql="select * from info order by hours desc limit 0,20";
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
    <title>排行榜</title>
    <style>
        .msg{
            width:50%;
            padding:20px;
            position:relative;
            word-wrap: break-word;
            word-break: normal;
            left:25%;
            border-radius:10px;
            background-color:rgba(255,255,255,0.5);
        }
        .d1:nth-child(2){
            background-color:gold;
        }
    </style>
</head>
<body style="background-color:rgba(30,40,110,0.9);">
    <div class="d1">
        <br />
        <br />
        <?php 
            $i=0;
            $j=1;
            $c="rgba(255,255,255,0.5)";
            try{
                while($row=mysqli_fetch_row($res)){
                    $e=1;
                    $st="&ensp;";
                    if($j>=10) $st="";
                    if($j==1){
                        $c="gold";
                    }
                    else if($j==2){
                        $c="#CECECE";
                    }
                    else if($j==3){
                        $c="#cc6633";
                    }
                    else{
                        $c="rgba(255,255,255,0.5)";
                    }
                    echo "<div class='msg' style='font-size:50px;top:$i"."px;background-color:".$c."'>";
                    echo $j.$st."&emsp;&emsp;&emsp;&emsp;&emsp;<b>".$row[1]."</b>&emsp;&emsp;&emsp;&emsp;&emsp;学时:<b>".($row[3])."</b>";
                    echo "</div>";
                    $i=$i+30;
                    $j=$j+1;
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