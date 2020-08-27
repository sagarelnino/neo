<?php
session_start();
require_once 'includes/application.php';
die('died'.'<pre>'.print_r($GLOBALS, true));
$app = new Application();
if(isset($_POST['submit'])){
    $username = $app->filter($_POST['username']); //ユーザー名を定義
    $password = $app->filter($_POST['pwd']); //ユーザー名を定義
    $password_confirm = $app->filter($_POST['pwd_confirm']); //ユーザー名を定義
    if($password == $password_confirm){
        if(strlen($password) >= 6){
            if(!($app->getUserByUsername($username))){
                $password = password_hash($password, PASSWORD_DEFAULT);
                $role_id = 3;
                $token = md5(time().$username);
                $created_at = date('Y-m-d H:i:s');
                $user_id = $app->addUser($username,$password,$role_id,$token,$created_at);
                $_SESSION['message'] = array(
                    'type' => 'success',
                    'text' => '成功に登録しました'
                );
                $_SESSION['user_id'] = $user_id;
                header('location:student_dashboard.php');
            }else{
                $_SESSION['message'] = array(
                    'type' => 'error',
                    'text' => '同じユーザー名はもう取られました。他のユーザー名を入力してください'
                );
            }
        }else{
            $_SESSION['message'] = array(
                'type' => 'error',
                'text' => 'パスワードは最低5文字必要です'
            );
        }
    }else{
        $_SESSION['message'] = array(
            'type' => 'error',
            'text' => 'パスワードを確認してください'
        );
    }
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
    <link rel="stylesheet" href="assets/css/app.css">

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
                    <form action="" method="POST" onsubmit="return validate()">
                        <div class="form-group">
                            <label for="username">ユーザー名:</label>
                            <input type="text" class="form-control" id="username" placeholder="ユーザー名を入力" name="username">
                            <span class="error-message" id="username_error"></span>
                        </div>
                        <div class="form-group">
                            <label for="pwd">パスワード</label>
                            <input type="password" class="form-control" id="pwd" placeholder="パスワードを入力" name="pwd">
                            <span class="error-message" id="pwd_error"></span>
                        </div>
                        <div class="form-group">
                            <label for="pwd_confirm">パスワード確認:</label>
                            <input type="password" class="form-control" id="pwd_confirm" placeholder="またパスワードを入力" name="pwd_confirm">
                            <span class="error-message" id="pwd_confirm_error"></span>
                        </div>
                        <button type="submit" name="submit" id="custom-button" class="btn btn-danger btn-outline-secondary mx-auto d-block">サインアップ</button>
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
    <script src="assets/js/app.js"></script>
    <script type="text/javascript">
        function validate() {
            var check = 1;
            /*ユーザー名は空いているかどうか*/
            if(document.getElementById('username').value === '' || document.getElementById('username').value.length < 5){
                document.getElementById('username_error').style.display = 'block';
                document.getElementById('username_error').innerText = '最低5文字が必要です';
                document.getElementById('username').setAttribute('class','error-input');
                check = 0;
            } else{
                document.getElementById('username_error').style.display = 'none';
                document.getElementById('username').setAttribute('class','correct-input');
            }
            console.log(document.getElementById('pwd').value.length);
            if(document.getElementById('pwd').value === '' || document.getElementById('pwd').value.length < 6){
                document.getElementById('pwd_error').style.display = 'block';
                document.getElementById('pwd_error').innerText = 'パスワードは最低6文字必要です。';
                document.getElementById('pwd').setAttribute('class','error-input');
                check = 0;
            }else{
                document.getElementById('pwd_error').style.display = 'none';
                document.getElementById('pwd').setAttribute('class','correct-input');
                if(document.getElementById('pwd_confirm').value === ''　|| document.getElementById('pwd_confirm').value !== document.getElementById('pwd').value){
                    document.getElementById('pwd_confirm_error').style.display = 'block';
                    document.getElementById('pwd_confirm_error').innerText = 'また同じパスワードを入力してください';
                    document.getElementById('pwd_confirm').setAttribute('class','error-input');
                    check = 0;
                } else{
                    document.getElementById('pwd_error').style.display = 'none';
                    document.getElementById('pwd_confirm').setAttribute('class','correct-input');
                }
            }
            if(check === 1){
                return true;
            }

            return false;
        }
    </script>
</body>
</html>