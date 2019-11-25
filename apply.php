<!doctype html>
<html>

<head>
    <meta charset="utf-8" />
    <title>学时申报</title>
    <link rel="stylesheet" href="./css/materialize.css">
    <script src="./js/materialize.js"></script>
    <link rel="stylesheet" href="./css/main.css">
</head>

<body style="background-color:rgba(30,40,110,0.9)">
    <div class="container" style="margin-top: 150px;">
        <button onclick="history.back(-1)" class=" btn blue-grey white-text">返回</button>
        <div class="card-panel white">
            <h1 style="margin-left: 5px;margin-top: 10px;" class="blue-grey-text">学时申报</h1>
            <div style="font-size:20px">
                &nbsp;&nbsp;<b>通知:</b>
                <?php
                    include_once "dbpwd.php";
                    $conn = mysqli_connect("127.0.0.1:3306", "root", $dbpwd);
                    mysqli_query($conn, "use mingde");
                    $sql="select * from notice";
                    $res=mysqli_query($conn,$sql);
                    $row=mysqli_fetch_row($res);
                    echo $row[1];
                ?>
            </div>
            <form action="send.php" method="POST">
                <div class="row"> 
                    <div class="input-field col s12">
                        <input id="name" name="name" style="display:none" value="<?php echo $_POST["name"]?>"/>
                        <input id="num" name="num" type="text" style="display:none" value="<?php echo $_POST['num']?>"/>
                        
                        <input id="hours" name="hours" type="text" placeholder="输入您要申报的学时" class="validate" required />
                        <input id="msg" name="msg" type="text" placeholder="申报原因" class="validate" required />
                    </div>
                </div>
                <button type="submit" class="btn blue">
                    提交申请
                </button>
            </form>
        </div>
    </div>

</body>

</html>