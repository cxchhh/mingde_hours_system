<!doctype html>
<html>
<?php
    $e = 1;
    $name = $_POST["name"];
    $num=$_POST["num"];
    $content=$_POST["content"];
    $msg="";
    include_once "dbpwd.php";
    $conn = mysqli_connect("127.0.0.1:3306", "root", $dbpwd);
    mysqli_query($conn, "use mingde");
    $sql="update notice set content='$content' where id=1";
    $res=mysqli_query($conn,$sql);
    $msg="发布成功";
    mysqli_close($conn);
?>

<head>
    <meta charset="utf-8">
    <!--<meta http-equiv="refresh" content='1;url=./index.php' />-->
    <script src="./js/jquery.js"></script>
    <script src="./js/jquery.form.js"></script>
    <link rel="stylesheet" href="./css/materialize.css">
    <link rel="stylesheet" href="./css/main.css">
    <title>发布中...</title>
</head>

<body style="background-color:rgba(30,40,110,0.9)">
    <div class="container center center-align center-block centered">
        <h1 class="white-text" style="margin-top: 150px; text-shadow: 1px 1px light-grey"><?php echo $msg; ?></h1>
    </div>
    <form method="POST" style="display:none" action="index.php" id="f1" enctype="multipart/form-data">
        <input name="username" style="display:none" type="text" value="<?php echo $name;?>"/>
        <input name="num" style="display:none" type="text" value="<?php echo $num;?>"/>
    </form>
    <script>
        if(<?php echo $e;?>==1)setTimeout("$('#f1').submit()",2000);
    </script>
</body>

</html>