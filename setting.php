<!doctype html>
<html>

<head>
    <meta charset="utf-8" />
    <title>设置</title>
    <script src="./js/materialize.js"></script>
    <script src="./js/jquery.js"></script>
    <script src="./js/jquery.form.js"></script>
    <link rel="stylesheet" type="text/css" media="screen" href="./css/materialize.css">
    <link rel="stylesheet" href="./css/main.css">

</head>

<body style="background-color:rgba(30,40,110,0.9)" >
    <div class="container" style="margin-top: 150px;">
        <button class="btn waves-effect waves-light blue-grey" onclick="history.back(-1)">返回</button>
        <form id="form1" action="change.php" method="POST" class="card-panel white teal-text" onsubmit="return submitmsg();">
            <h1 style="margin-left: 5px;margin-top: 10px;" class="blue-grey-text ">修改密码</h1>
            <input type='text' style='display:none' name='num' value='<?php echo $_POST["num"] ?>'/>
            <input type='text' style='display:none' name='name' value='<?php echo $_POST["name"] ?>'/>
            <input type='text' style='display:none' name='hours' value='<?php echo $_POST["hours"] ?>'/>
            <div class="row">
                <div class="input-field col s12">
                    <input id="old" name="old" type="password" class="validate" required>
                    <label for="old">旧密码</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input id="new" name="new" type="password" class="validate" required>
                    <label for="new">新密码</label>
                </div>
            </div>

            <div class="row">
                <button type="submit" class="btn col blue" style="margin-right: 20px;">保存</button>&nbsp;&nbsp;
            </div>
        </form>
    </div>
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