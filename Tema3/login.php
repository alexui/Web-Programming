<?php  

	include 'chat.php';

	function main () {

		$chat = Chat::get_chat_instance();

		if (!@$_POST['jsonData']) die();
		
		$recv = json_decode($_POST['jsonData']);
		
		if (!$recv || !$recv->username || !$recv->password) die();
		
		$result = $chat->login_user($recv->username, $recv->password);

		switch ($result) {
		 	case 0:
		 		echo json_encode(array('success' => 1, "message" => "ok"));
		 		break;
		 	case 1:
		 		echo json_encode(array('success' => 0, "message" => "username does not exist"));
		 		break;
		 	case 2:
		 		echo json_encode(array('success' => 0, "message" => "incorrect password"));
		 		break;
		}		
	}

	main();

?>