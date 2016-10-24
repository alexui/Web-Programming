<?php  

	include 'chat.php';

	function main () {

		$chat = Chat::get_chat_instance();

		if (!@$_POST['jsonData']) die();
		
		$recv = json_decode($_POST['jsonData']);
		
		if (!$recv || !$recv->username) die();
		
		$chat->logout_user($recv->username);	
	}

	main();

?>