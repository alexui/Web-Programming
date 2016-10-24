<!DOCTYPE html>
<html>
<head>
	<title>Ex1</title>
	<?php 
		require_once 'idiorm.php';
		ORM::configure('sqlite:db.sqlite');

		echo "====ex1====<br>";
		if (array_key_exists('id', $_GET)) {
			$id = $_GET['id'];
			$result = ORM::for_table('articles')->where('id', $id)->select('text')->find_one();
			echo 'Text for article ' . $id . ' is ' . $result->text . '<br>';
			echo '<iframe height="800px" width="500px" src="' . $id .'.php"></iframe>';
		}
		else
			echo "id is null <br>";
	?>
</head>
<body>
	
</body>
</html>

