<?php 

	include 'chat.php';

	function main () {

		$chat = Chat::get_chat_instance();
		$no_users = $chat->get_no_users();
		echo json_encode(array('no_users' => $no_users));
	}

	main();

?>