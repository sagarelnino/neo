<?php
require_once 'includes/application.php';
$app = new Application();
if(isset($_POST['submit'])){
    $username = $app->filter($_POST['username']); //ユーザー名前を定義
    $password = $app->filter($_POST['pwd']); //ユーザー名前を定義
    $password_confirm = $app->filter($_POST['pwd_confirm']); //ユーザー名前を定義

}
?>
<!DOCTYPE html>
<html lang="ja-jp">
<head>
	<title>Registration</title>
    <!--Icon in title-->
    <link rel="shortcut icon" href="assets/images/log.ico">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/app_bkup.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
    <script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container-fluid">
        <div class="offset-md-4 col-md-4">
            <img class="img-fluid mx-auto d-block" id="login-thumb" src="assets/images/NEO_logo.png">
            <?php include_once 'flash_message.php';?>
            <div class="auth-box">
                <div class="auth-header">
                    <h1 class="text-center">登録</h1>
                </div>
                <div class="auth-form">
                    <form action="" method="POST" onsubmit="validate()">
                        <div class="form-group">
                            <label for="username">ユーザー名:</label>
                            <input type="text" class="form-control" id="username" placeholder="ユーザー名を入力" name="username">
                            <span class="error-message" id="username_error"></span>
                        </div>
                        <div class="form-group">
                            <label for="pwd">パスワード</label>
                            <input type="password" class="form-control" id="pwd" placeholder="パスワードを入力" name="pwd">
                            <span class="error-message" id="pwd_confirm_error"></span>
                        </div>
                        <div class="form-group">
                            <label for="pwd_confirm">パスワード確認:</label>
                            <input type="password" class="form-control" id="pwd_confirm" placeholder="またパスワードを入力" name="pwd_confirm">
                            <span class="error-message" id="pwd_confirm_error"></span>
                        </div>
                        <button type="submit" id="custom-button" class="btn btn-danger btn-outline-secondary mx-auto d-block">サインアップ</button>
                    </form>
                </div>
                <div class="auth-footer">
                    <div class="auth-alert">
                        <p class="text-center">もうアカウントはありますか？? <a href="index.php">ログインはこちら！!</a></p>
                    </div>
                </div>
            </div>
        </div>
	</div>
    <script type="text/javascript">
        function validate() {
            var check = 1;
            /*ユーザー名前は空いているかどうか*/
            if(document.getElementById('username').value == ''){
                document.getElementById('username_error').style.display = 'block';
                document.getElementById('username_error').innerText = 'ユーザー名前は必要です';
                document.getElementById('username').setAttribute('class','error-input');
                check = 0;
            }
            /*ユーザー名前の長さは足りるかどうか*/
            else if(document.getElementById('username').value.length < 5){
                document.getElementById('username_error').style.display = 'block';
                document.getElementById('username_error').innerText = '最低5文字が必要です';
                document.getElementById('username').setAttribute('class','error-input');
                check = 0;
            } else{
                document.getElementById('username_error').style.display = 'none';
                document.getElementById('username').removeAttribute('class','error-input');
                document.getElementById('username').setAttribute('class','correct-input');
            }
            if(document.getElementById('pwd').value == ''){
                document.getElementById('pwd_error').style.display = 'block';
                document.getElementById('pwd_error').innerText = 'パスワードは必要です';
                document.getElementById('pwd').setAttribute('class','error-input');
                check = 0;
            }else{
                document.getElementById('pwd_error').style.display = 'none';
                document.getElementById('pwd').removeAttribute('class','error-input');
                document.getElementById('pwd').setAttribute('class','correct-input');
            }
            if(check == 1){
                return true;
            }
            return false;
        }
    </script>
</body>
</html>