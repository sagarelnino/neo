<?php
require_once 'includes/application.php';
$app = new Application();
if(isset($_POST['submit'])){
    $username = $app->filter($_POST['username']); //ユーザー名前を定義
    $password = $app->filter($_POST['pwd']); //ユーザー名前を定義
    $userInfo = $app->getUserByUsername($username);
    if($userInfo){
        if(password_verify($password,$userInfo->PASSWORD)){
            $_SESSION['user_id'] = $userInfo->id;
            if($userInfo->ROLE_ID == 1){
                $_SESSION['message'] = array(
                    'type' => 'success',
                    'text' => 'Welcome Admin'
                );
                /*header('location: admin_dashboard.php');*/
            }elseif ($userInfo->ROLE_ID == 2){
                $_SESSION['message'] = array(
                    'type' => 'success',
                    'text' => 'Welcome Teacher'
                );
                /*header('location: teacher_dashboard.php');*/
            }elseif ($userInfo->ROLE_ID == 3){
                $_SESSION['message'] = array(
                    'type' => 'success',
                    'text' => 'Welcome Student'
                );
                header('location: student_dashboard.php');
            }
        }else{
            $_SESSION['message'] = array(
                'type' => 'error',
                'text' => 'パスワードは正しくない'
            );
        }
    }else{
        $_SESSION['message'] = array(
            'type' => 'error',
            'text' => 'ユーザー名前は正しくない'
        );
    }
}
?>
<!DOCTYPE html>
<html lang="ja-jp">
<head>
	<title>Login</title>
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
    <div class="offset-md-4 col-md-4 col-xs-12">
        <img class="img-fluid mx-auto d-block" id="login-thumb" src="assets/images/NEO_logo.png">
        <?php include_once 'flash_message.php';?>
        <div class="auth-box">
            <div class="auth-header">
                <h1 class="text-center custom-form-header">ログイン</h1>
            </div>
            <div class="auth-form">
                <form action="" method="POST" id="login_form" onsubmit="return validate()">
                    <div class="form-group">
                        <label for="username">ユーザー名前:</label>
                        <input type="text" class="form-control" id="username" placeholder="ユーザー名前を入力" name="username" value="<?php echo isset($_POST['username']) ? $_POST['username'] : ''; ?>">
                        <span class="error-message" id="username_error"></span>
                    </div>
                    <div class="form-group">
                        <label for="pwd">パスワード:</label>
                        <input type="password" class="form-control" id="pwd" placeholder="パスワードうを入力" name="pwd">
                        <span class="error-message" id="pwd_error"></span>
                    </div>
                    <button type="submit" name="submit" id="custom-button" class="btn btn-danger btn-outline-secondary mx-auto d-block">ログイン</button>
                </form>
            </div>
            <div class="auth-footer">
                <div class="auth-alert">
                    <p class="text-center"><a href="#">パスワードを忘れましたか?</a></p>
                    <p class="text-center">アカウントがありませんか?　<a href="signup.php">サインアップはこちら!</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function validate() {
        var check = 1;
        if(document.getElementById('username').value == ''){
            document.getElementById('username_error').style.display = 'block';
            document.getElementById('username_error').innerText = 'ユーザー名前は必要です';
            document.getElementById('username').setAttribute('class','error-input');
            check = 0;
        }else{
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