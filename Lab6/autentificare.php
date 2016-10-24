<!DOCTYPE html>
<html>
<head>
	<title>AutentificareEx4</title>
	<?php
		session_start();
	
		echo "COOKIE : ";
		print_r($_COOKIE);	
		echo "<br>";

		echo 'session status : ' . session_status() . ' , SID : ' . SID .'<br>';
		echo 'SESSION : ';
		print_r($_SESSION);
		echo "<br>";
	
		// $article = ORM::for_table('articles')->create();

		echo "====ex4====<br>";
	?>
</head>
<body>
	<p>Intruduceti credentiale</p>
	<form action="autentificare.php" method="POST">
		<table>
			<tr>
				<td>
					<label>User :</label>
				</td>
				<td>
					<input type="text" name="camp_user" placeholder="completeaza aici" value="user">
				</td>
			</tr>
			<tr>
				<td>
					<label>Parola :</label>
				</td>
				<td>
					<input type="password" name="camp_parola" placeholder="completeaza aici" value="parola">
				</td>
			</tr>
			<tr>
				<td>
					<button type="submit">Trimite</button>
				</td>
			</tr>
		</table>		
	</form>
	<?php 

		require_once 'idiorm.php';
		ORM::configure('sqlite:db.sqlite');
		$result = ORM::for_table('users')->find_many();

		if (count($_POST)) {
			$camp_user = $_POST['camp_user'];
			$camp_parola = $_POST['camp_parola'];

			$match = false;
			foreach ($result as $row) {
				$user = $row->username;
				$password = $row->password;
				$rights = $row->rights;

				if ($camp_user == $user && md5($camp_parola) == $password) {
					$match = true;
					break;
				}

			}
			if (!$match)
				echo "User si parola incorecte!!!!!!!!!!!!!<br>";
			else {
				$session_value = rand();
				$session_username = $user;
				$session_rights = $rights;

				$cookie_name = 'user';
				$cookie_value = $user;

				setcookie($cookie_name, $cookie_value, time() + 86400, "/"); // 86400 = 1 day
				$_SESSION['session'] =  $session_value;
				$_SESSION['username'] = $session_username;
				$_SESSION['rights'] = $session_rights;
				$_SESSION['visited'] = array();
				header("Location: formular.php");
			}

			unset($_POST);
		}
		$a = 10;
		$b = 3;
		$c = intval($a / $b);
		$d = $a % $b;
		echo "result : " . $c . "  remainder : " . $d . "<br>";
	?>
	<p>
		Pentru a vedea efectele:
		<ul>
			<li>sterge cookieurile din browser</li>
			<li>reincarca pagina -> se seteaza SID</li>
			<li>reincarca pagina -> se primeste cookie</li>
		</ul>
	</p>

	<p>
		session_destroy - doar goleste fisierul asociat sesiunii<br>
		vezi in php.ini -> 'session.save_path'
	</p>

</body>
</html>