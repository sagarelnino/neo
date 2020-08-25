<!DOCTYPE html>
<html lang="JP">
<head>
	<title>Registrtaion</title>
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
				<div class="auth-box">
					<div class="auth-header">
						<h1 class="text-center">登録</h1>
					</div>					
					<div class="auth-form">
						<form action="/action_page.php">
						    <div class="form-group">
						      <label for="usr">ユーザー名:</label>
						      <input type="text" class="form-control" id="user" placeholder="ユーザー名を入力" name="user">
						      <span class="auth-message">妥当なユーザー名を入力してください！</span>
						    </div>
						    <div class="form-group">
						      <label for="pwd">パスワード</label>
						      <input type="password" class="form-control" id="pwd" placeholder="パスワードを入力" name="pswd">
						    </div>
						    <div class="form-group">
						      <label for="pwd">パスワード確認:</label>
						      <input type="password" class="form-control" id="pwd" placeholder="またパスワードを入力" name="pswd">
						      <span class="auth-message">パスワードが一致しません</span>
						    </div>
    						<button type="submit" id="custom-button" class="btn btn-danger btn-outline-secondary mx-auto d-block">サインアップ</button>
    						<div class="auth-alert">
    							<p class="text-center" style="margin-top: -5px;">もうアカウントはありますか？?<a href="#">ログインはこちら！!</a></p>
    						</div>
  						</form>
					</div>
					<div class="auth-footer">
						
					</div>

				</div>
			</div>
			
	</div>
</body>
</html>