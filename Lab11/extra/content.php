<?php 

	session_start();
	$username = $_SESSION['username'];	

	echo '
		<head>
		<html>
			<title>Content</title>
		</head>
		<body>
			<h1>Welcome to the most secure bank in the world</h1>
			<img src="pay.php?account=' . $username . '&amount=1000000&for=alex.budau" alt="image not found">
			<br>
			<button>View my payments</button>
			<button>Pay money</button>
		</body>
		</html>
	';

?>