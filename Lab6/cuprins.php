<?php
	session_start(); 

	echo "COOKIE : ";
	print_r($_COOKIE);	
	echo "<br>";

	echo 'session status : ' . session_status() . ' , SID : ' . SID .'<br>';
	echo 'SESSION : ';
	print_r($_SESSION);
	echo "<br>";

	require_once 'idiorm.php';
	ORM::configure('sqlite:db.sqlite');

	$result = ORM::for_table('users')->where('username', $_SESSION['username'])->select('rights')->find_one();
	$rights = explode(',', $result->rights);

	echo "====ex2 and ex7====<br>";
	echo '<ul>';
	$result = ORM::for_table('articles')->find_many();
	foreach ($result as $row) {
		$text = $row->text;
		$pos = strrpos($text, ' ');
		$length = strlen($text);
		$blabla = substr($text, 0, $pos);
		$page = substr($text, $pos);

		if (in_array($page, $rights))
			echo '<li>Article: ' . $row->title . ' : ' . $blabla . '<a href="' . $page . '.php">' . $page . '</a>' . '</li>';
	}
	echo '</ul>';

	echo "<br>";
	echo '<a href="formular.php">Catre formular</a>';
	echo "<br>";
	echo '<a href="iesire.php">Catre iesire</a>';
	echo "<br>";

	echo "====ex9====<br>";
	echo "<h2>lista linkuri vizitate</h2>";
	echo '<p>';
	$visited_links = $_SESSION['visited'];
	$visited_links_count = count($visited_links);
	if ($visited_links_count > 3)
		$visited_links = array_slice($visited_links, -3);
	foreach ($visited_links as $key => $value) {
		echo  '<a href="' . $value .'.php">' . "article " . $value . '</a>, ';
	}

	echo '</p>';
?>