<?php  

	include 'chat.php';

	function main () {

		$chat = Chat::get_chat_instance();

		$messages_array = $chat->get_last_30_messages();
		echo json_encode($messages_array);

	}

	main();

?>