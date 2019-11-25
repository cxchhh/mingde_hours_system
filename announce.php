<!doctype html>
<html>

<head>
    <meta charset="utf-8" />
    <title>发布通知</title>
    <script src="./js/materialize.js"></script>
    <script src="./js/jquery.js"></script>
    <script src="./js/jquery.form.js"></script>
    <link rel="stylesheet" type="text/css" media="screen" href="./css/materialize.css">
    <link rel="stylesheet" href="./css/main.css">

</head>

<body style="background-color:rgba(30,40,110,0.9)" >
    <?php
        error_reporting(0);
        $name=$_POST["name"];
        $num=$_POST["num"];
        try{
            if($_POST["name"]!="admin"){
            $e=0;
            echo "<h1 style='text-align:center;color:white'>权限不足，请用管理员帐号登录</h1>";
        }
        else{
            echo '<div class="container" style="margin-top: 150px;">
        <button class="btn waves-effect waves-light blue-grey" onclick="history.back(-1)">返回</button>
        <form id="form1" action="update.php" method="POST" class="card-panel white teal-text" onsubmit="return submitmsg();">
            <h1 style="margin-left: 5px;margin-top: 10px;" class="blue-grey-text ">发布通知</h1>
            <div class="row">
                <input name="num" type="text" style="display:none" value="'.$num.'"/>
                <input name="name" type="text" style="display:none" value="'.$name.'"/>
                <div class="input-field col s12">
                    <textarea id="content" style="height:500px" name="content" placeholder="通知内容" class="validate" required></textarea>
                </div>
            </div>

            <div class="row">
                <button type="submit" class="btn col blue" style="margin-right: 20px;">发布</button>&nbsp;&nbsp;
            </div>
        </form>
    </div>';
        }
        }
        finally{
            
        }
        
    ?>
    
    <script>
        function submitmsg(){
            $("#form1").ajaxsubmit(function(msg){
                alert(msg);
            });
            return false;
        }
        </script>
</body>

</html>