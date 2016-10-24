<?php  

	session_start();

	$user_allowed = "iulia.gruia";
	$password_allowed = "pw";

	echo '
		<html>
		<head>
			<title>
				PW Bank
			</title>
		</head>
		<body>
			<h1>Welcome to my Bank</h1>
			<h2>Please ... Log In !</h2>
			<div id="form_login_container">
				<form method="POST" action="index.php">
					<p>Username</p>
					<p><input name="username" type="text" placeholder="username"></p>
					<p>Password</p>
					<p><input name="password" type="password" placeholder="password"></p>
					<p><input name="submit" type="submit"></p>
				</form>
			</div>
		</body>
		</html>
	';

	if (isset($_POST['username']) && isset($_POST['password'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];
		if ($username == $user_allowed && $password == $password_allowed) {
			header('Location: content.php');
			$_SESSION['username'] = $username;
			$_SESSION['password'] = $password;
		}
	}

?>