<?php  

	include 'chat.php';

	function main () {

		$chat = Chat::get_chat_instance();

		$contact_list = $chat->get_users();
 		echo json_encode($contact_list);
	}

	main();

?>