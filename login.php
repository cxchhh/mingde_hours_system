
<?php
    $e=1;
    $num=$_POST["num"];
    $pwd=$_POST["pwd"];
    $msg = "";
    include_once "dbpwd.php";
    $conn=mysqli_connect("127.0.0.1:3306","root",$dbpwd);
    mysqli_query($conn,"use mingde");
    $sql="select * from info where id='$num'";
    $user="";
    $hours=0;
    $res=mysqli_query($conn,$sql);
        if(mysqli_num_rows($res)){
            $row=mysqli_fetch_row($res);
            $user=$row[1];
            $hours=$row[3];
            if($pwd!=$row[2]){
                $msg="用户不存在或密码有误";
                $e=0;
            }
        }
        else{
            $msg="用户不存在或密码有误";
            $e=0;
        }
    if($e==1)$msg= "欢迎 $user 登录!";
 
    mysqli_close($conn);
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
    <title>登录</title>
</head>
<body style="background-color:rgba(30,40,110,0.9)">
    <div class="container center center-align center-block centered">
        <h1 class="white-text" style="margin-top: 150px; text-shadow: 1px 1px light-grey"><?php echo $msg;?></h1>
    </div>
    <form method="POST" style="display:none" action="index.php" id="f1" enctype="multipart/form-data">
        <input name="username" style="display:none" type="text" value="<?php echo $user;?>"/>
        <input name="num" style="display:none" type="text" value="<?php echo $num;?>"/>
        <input name="hours" style="display:none" type="text" value="<?php echo $hours;?>"/>
    </form>
    <script>
        if(<?php echo $e;?>==1)setTimeout("$('#f1').submit()",2000);
    </script>

</body>
</html>
