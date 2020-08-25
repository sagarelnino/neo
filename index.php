<!DOCTYPE html>
<html lang="JP">
<head>
	<title>Login</title>
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
						<h1 class="text-center">ログイン</h1>
					</div>					
					<div class="auth-form">
						<form action="/action_page.php">
						    <div class="form-group">
						      <label for="email">Email:</label>
						      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
						    </div>
						    <div class="form-group">
						      <label for="pwd">Password:</label>
						      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd">
						    </div>
						    <div class="form-group form-check">
						      <label class="form-check-label">
						        <input class="form-check-input" type="checkbox" name="remember"> Remember me
						      </label>
						    </div>
    						<button type="submit" class="btn btn-outline-secondary">Submit</button>
  						</form>
					</div>
					<div class="auth-footer">
						
					</div>

				</div>
			</div>
			
	</div>
</body>
</html>