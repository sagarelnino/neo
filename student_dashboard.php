<!DOCTYPE html>
<html lang="ja-jp">
<head>
	<title>Student Menu</title>
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
	<nav class="navbar navbar-expand-md navbar-light bg-light">
    <a href="#" class="navbar-brand"><img class="logo-image" src="assets/images/NEO_logo.jpg"></a>
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
        <div class="navbar-nav ml-auto">
            <a href="#" class="nav-item nav-link active">レッスン</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">プログラム</a>
                <div class="dropdown-menu">
                    <a href="#" class="dropdown-item">自分の</a>
                    <a href="#" class="dropdown-item">全て</a>
                </div>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">アカウント</a>
                <div class="dropdown-menu">
                    <a href="#" class="dropdown-item">プロファイル</a>
                    <a href="#" class="dropdown-item">購入履歴</a>
                </div>
            </div>
        </div>
        <div class="navbar-nav">
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">生徒</a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a href="#" class="dropdown-item">パスワードを変更</a>
                    <a href="#" class="dropdown-item">ログアウト</a>
                </div>
            </div>
        </div>
    </div>
	</nav>
</body>
</html>