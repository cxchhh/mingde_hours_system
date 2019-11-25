<!doctype html>
<html>
<?php
//phpinfo();
    $e = 1;
    $name = $_POST["name"];
    $num=$_POST["num"];
    $hours = $_POST["hours"];
    $msg=htmlspecialchars($_POST["msg"]);
    if ($hours == null) {
        echo "学时不能为空";
        $e = 0;
    }
    if ($msg == null) {
        $msg="无";
        $e = 0;
    }
    include_once "dbpwd.php";
    $conn = mysqli_connect("127.0.0.1:3306", "root", $dbpwd);
    mysqli_query($conn, "use mingde");
    $sql="insert into application(num,name,msg,hours) values($num,'$name','$msg','$hours')";
    if($e==1)mysqli_query($conn,$sql);
    if($e==1) $msg="成功申报，请等待处理";
    $sql="select * from info where id=$num";
    $res=mysqli_query($conn,$sql);
    $row=mysqli_fetch_row($res);
    $hours=$row[3];
    mysqli_close($conn);
?>

<head>
    <meta charset="utf-8">
    <!--<meta http-equiv="refresh" content='1;url=./index.php' />-->
    <script src="./js/jquery.js"></script>
    <script src="./js/jquery.form.js"></script>
    <link rel="stylesheet" href="./css/materialize.css">
    <link rel="stylesheet" href="./css/main.css">
    <title>学时申报</title>
</head>

<body style="background-color:rgba(30,40,110,0.9)">
    <div class="container center center-align center-block centered">
        <h1 class="white-text" style="margin-top: 150px; text-shadow: 1px 1px light-grey"><?php echo $msg; ?></h1>
    </div>
    <form method="POST" style="display:none" action="index.php" id="f1" enctype="multipart/form-data">
        <input name="username" style="display:none" type="text" value="<?php echo $name;?>"/>
        <input name="num" style="display:none" type="text" value="<?php echo $num;?>"/>
        <input name="hours" style="display:none" type="text" value="<?php echo $hours;?>"/>
    </form>
    <script>
        if(<?php echo $e;?>==1)setTimeout("$('#f1').submit()",2000);
    </script>
</body>

</html>