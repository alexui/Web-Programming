<!DOCTYPE html>
<html>
<head>
	<title>FormularEx3</title>
	<?php
		session_start();

		// if(!isset($_COOKIE[''])) {
		//     echo "Cookie named '" . $cookie_name . "' is not set!";
		// } else {
		//     echo "Cookie '" . $cookie_name . "' is set!<br>";
		//     echo "Value is: " . $_COOKIE[$cookie_name];
		// }

		echo "COOKIE : ";
		print_r($_COOKIE);	
		echo "<br>";

		echo 'session status : ' . session_status() . ' , SID : ' . SID .'<br>';
		echo 'SESSION : ';
		print_r($_SESSION);
		echo "<br>";

		require_once 'idiorm.php';
		ORM::configure('sqlite:db.sqlite');

		if (count($_POST)) {
			$camp_titlu = $_POST['camp_titlu'];
			$camp_text = $_POST['camp_text'];

			$article = ORM::for_table('articles')->create();
			$article->title = $camp_titlu;
			$article->text = $camp_text;
			$article->save();

			unset($_POST);
		}

		// $article = ORM::for_table('articles')->create();

		echo "====ex3====<br>";
	?>
</head>
<body>
	<p>Intruduceti un articol</p>
	<form action="formular.php" method="POST">
		<table>
			<tr>
				<td>
					<label>Titlul :</label>
				</td>
				<td>
					<input type="text" name="camp_titlu" placeholder="completeaza aici">
				</td>
			</tr>
			<tr>
				<td>
					<label>Textul :</label>
				</td>
				<td>
					<input type="text" name="camp_text" placeholder="completeaza aici">
				</td>
			</tr>
			<tr>
				<td>
					<button type="submit">Trimite</button>
				</td>
			</tr>
		</table>
		<a href="cuprins.php">Catre cuprins</a>
		<br>
		<a href="iesire.php">Catre iesire</a>		
	</form>
</body>
</html>