<?php
$idx=$_POST["idx"];
$num=$_POST["num"];
$name=$_POST["name"];
$msg=$_POST["msg"];
$addhours=$_POST["hours"];
$res=$_POST["res"];
$reason=$_POST["reason"];
 include_once "dbpwd.php";
 $conn = mysqli_connect("127.0.0.1:3306", "root", $dbpwd);
 mysqli_query($conn, "use mingde");
 $sql="delete from application where id=$idx";
 mysqli_query($conn,$sql);
 if($res==1){
     $sql="select * from info where id=$num";
     $res=mysqli_query($conn,$sql);
     $row=mysqli_fetch_row($res);
     $hours=$row[3]+$addhours;
     $sql="update info set hours=$hours where id=$num";
     mysqli_query($conn,$sql);
     $mmsg="<i>$name</i> 学时申报：$msg <br /><b>已通过</b>";
     $sql="insert into msgs (num,msg) values($num,'$mmsg')";
 }
 else{
     $reason=strip_tags($reason);
     $mmsg="<i>$name</i> 学时申报：$msg <br /><b>被拒绝</b>,原因是:$reason";
     $sql="insert into msgs (num,msg) values($num,'$mmsg')";
 }
 mysqli_query($conn,$sql);
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
    <title>处理申报</title>
</head>
<body>
    <form method="POST" style="display:none" action="handle.php" id="f1" enctype="multipart/form-data">
    <input name="name" type="text" style="display:none" value="admin"/>
    </form>
    <script>
        setTimeout("$('#f1').submit()",2000);
    </script>

</body>
</html>