
<?php
    $e=1;
    $num=$_POST["num"];
    $old=$_POST["old"];
    $new=$_POST["new"];
    $msg = "";
    include_once "dbpwd.php";
    $conn=mysqli_connect("172.16.190.37:3306","root",$dbpwd);
    mysqli_query($conn,"use mingde");
    $sql="select * from info where id='$num'";
    $user="";
    $hours=0;
    $res=mysqli_query($conn,$sql);
        if(mysqli_num_rows($res)){
            $row=mysqli_fetch_row($res);
            $pwd=$row[2];
            if($old!=$pwd){
                $msg="旧密码有误";
                $e=0;
            }
        }
    if($e==1){
        $sql="update info set pwd='$new' where id='$num'";
        $res=mysqli_query($conn,$sql);
        $msg="修改成功!";
    }
    mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <!--<meta http-equiv="refresh" content='1;url=./index.php' />-->
    <script src="./js/jquery.js"></script>
    <script src="./js/jquery.form.js"></script>
    <title>设置</title>
    <link rel="stylesheet" href="./css/materialize.css">
    <link rel="stylesheet" href="./css/main.css">
</head>
<body style="background-color:rgba(30,40,110,0.9)">
    <div class="container center center-align center-block centered">
        <h1 class="white-text" style="margin-top: 150px; text-shadow: 1px 1px light-grey"><?php echo $msg;?></h1>
    </div>
    <form method="POST" style="display:none" action="index.php" id="f1" enctype="multipart/form-data">
        <input name="username" style="display:none" type="text" value="<?php echo $_POST["name"];?>"/>
        <input name="num" style="display:none" type="text" value="<?php echo $num;?>"/>
        <input name="hours" style="display:none" type="text" value="<?php echo $_POST["hours"];?>"/>
    </form>
    <script>
        if(<?php echo $e;?>==1)setTimeout("$('#f1').submit()",2000);
        else setTimeout("history.back(-1)",2000);
    </script>

</body>
</html>
