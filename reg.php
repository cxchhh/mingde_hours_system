<!doctype html>
<html>
<?php
//phpinfo();
$e = 1;
$user = $_POST["user"];
$pwd = $_POST["pwd"];
$num=$_POST["num"];
if ($user == null) {
    echo "用户名不能为空";
    $e = 0;
}
if ($pwd == null) {
    echo "密码不能为空";
    $e = 0;
}
if ($num == null) {
    echo "学号不能为空";
    $e = 0;
}
include_once "dbpwd.php";
$conn = mysqli_connect("127.0.0.1:3306", "root", $dbpwd);
mysqli_query($conn, "use mingde");
$sql = "select * from info where name='$user'";
$res = mysqli_query($conn, $sql);
if (mysqli_num_rows($res)) {
    $msg = "用户名已存在";
    $e = 0;
}
$sql="insert into info(id,name,pwd,hours) values('$num','$user','$pwd',0)";
if($e==1){
    mysqli_query($conn,$sql);
    $msg="注册成功";
}
$hours=0;
mysqli_close($conn);
?>

<head>
    <meta charset="utf-8">
    <!--<meta http-equiv="refresh" content='1;url=./index.php' />-->
    <script src="./js/jquery.js"></script>
    <script src="./js/jquery.form.js"></script>
    <link rel="stylesheet" href="./css/materialize.css">
    <link rel="stylesheet" href="./css/main.css">
    <title>注册</title>
</head>

<body style="background-color:rgba(30,40,110,0.9)">
    <div class="container center center-align center-block centered">
        <h1 class="white-text" style="margin-top: 150px; text-shadow: 1px 1px light-grey"><?php echo $msg; ?></h1>
    </div>
    <form method="POST" style="display:none" action="index.php" id="f1" enctype="multipart/form-data">
        <input name="username" style="display:none" type="text" value="<?php echo $user; ?>" />
        <input name="num" style="display:none" type="text" value="<?php echo $num; ?>" />
        <input name="hours" style="display:none" type="text" value="0"/>

    </form>
    <script>
        <?php
        $str="$('#f1').submit()";
        if($e==1) echo "setTimeout($str,1500);";
        ?>
        setTimeout("window.location.href='reg.html'",1500);
    </script>
</body>

</html>