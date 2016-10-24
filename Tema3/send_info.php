<?php  

	include 'chat.php';
	
	function main () {

		$chat = Chat::get_chat_instance();

		if (!@$_POST['jsonData']) die();
		
		$recv = json_decode($_POST['jsonData']);
		
		if (!$recv || !$recv->username || !$recv->info_username || !$recv->message) die();

		$chat->insert_message($recv->username, $recv->message);	

		$username = "System";

		$info = $chat->get_info($recv->info_username);
		
		$chat->insert_message($username, $info);	
	}

	main();

?>