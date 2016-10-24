<?php 

	include 'chat.php';

	function main () {

		$chat = Chat::get_chat_instance();

		if (!@$_POST['jsonData']) die();
		
		$recv = json_decode($_POST['jsonData']);
		
		if (!$recv || !$recv->username || !$recv->password || !$recv->country) die();
		
		if ($chat->insert_user($recv->username, $recv->password, $recv->country)) {
			echo json_encode(array('success' => 1, "message" => "ok"));
		}
		else
			echo json_encode(array('success' => 1, "message" => "existing username"));		
	}

	main();

?>