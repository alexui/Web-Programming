<?php 

	require_once 'idiorm.php';
	ORM::configure('mysql:host=localhost:3388;dbname=tema3');
	ORM::configure('username', 'root');
	ORM::configure('password', '');

	ORM::configure('id_column_overrides', array(
	    'users' => 'username'
	));

	class Chat {

		private static $chat = NULL;

		const USERS = "users";
		const MESSAGES = "messages";
		const QUESTIONS = "questions";
		const LAST_QUESTION = "last_question";

		private function __construct() {
		}

		public static function get_chat_instance() {
			if (NULL == self::$chat) {
				self::$chat = new Chat();
    		}
        	return self::$chat;
		}

		public function get_no_users() {

			$no_users = ORM::for_table(self::USERS)->count();
			return $no_users;
		}

		public function insert_user($username, $password, $country) {

			$user = ORM::for_table(self::USERS)->where('username', $username)->find_one();

			if (!$user) {
				$user = ORM::for_table(self::USERS)->create();
				$user->username = $username;
				$user->password = $password;
				$user->country = $country;
				$user->save();
				return 1;
			}
			else
				return 0;
		}

		public function login_user($username, $password) {
			$user = ORM::for_table(self::USERS)->where('username', $username)->find_one();
			if ($user) {
				if (strcmp($user->password, $password) == 0) {
					$user->online = 1;
					$user->score = 0;
					$user->save();
					return 0;
				}
				else 
					return 2;
			}
			else
				return 1;
		}

		public function logout_user($username) {
			$user = ORM::for_table(self::USERS)->where('username', $username)->find_one();
			$user->online = 0;
			$user->save();
		}

		public function get_users() {
			$users = ORM::for_table(self::USERS)
				->order_by_asc('username')
				->find_many();
			$users_array = array();

			foreach ($users as $user) {
				$user_array = $user->as_array('username');
				array_push($users_array, $user_array['username']);
			}

			return $users_array;
		}

		public function insert_message($username, $msg, $question = 0) {
			$message = ORM::for_table(self::MESSAGES)->create();
			$message->username = $username;
			$message->set_expr('timestamp', 'SYSDATE()');
			$message->message = $msg;
			$message->question = $question;
			$message->save();
		}

		public function get_last_30_messages() {

			$count = ORM::for_table(self::MESSAGES)->count();
			$offset = $count - 30;

			if ($offset < 0)
				$offset = 0;

			$messages = ORM::for_table(self::MESSAGES)
				->offset($offset)
				->limit(30)
				->find_many();
			$messages_array = array();

			foreach ($messages as $message) {
				array_push($messages_array, 
					$message->as_array());
			}

			return $messages_array;
		}

		public function get_next_question() {

			$last_question = ORM::for_table(self::LAST_QUESTION)->find_one();

			$question = ORM::for_table(self::QUESTIONS)
				->where_gt('id', $last_question->id)
				->find_one();

			// if (!$question) {
			// 	$id = 0;
			// 	$last_question = ORM::for_table(self::LAST_QUESTION)->create();
			// 	$last_question->id = $id;
			// 	$last_question->save();

			// 	$question = ORM::for_table(self::QUESTIONS)
			// 		->where_gt('id', $id)
			// 		->find_one();
			// }

			$question_array = $question->as_array();

			$last_question->delete();
			$new_question = ORM::for_table(self::LAST_QUESTION)->create();
			$new_question->id = $question->id;
			$new_question->save();

			return $question_array;
		}

		public function get_info($username) {

			$user = ORM::for_table(self::USERS)->where('username', $username)->find_one();

			if (!$user) {
				$message = "Inexistent user " . $username;
			}
			else {
				$message = $user->username . 
					" lives in " . $user->country . 
					" and has " . $user->score .
					" points"; 
			}

			return $message;
		}

		public function validate_response($username, $question_id, $message) {

			$question = ORM::for_table(self::QUESTIONS)->find_one($question_id);
			if ($question->correct == $message) {
				$user = ORM::for_table(self::USERS)
					->where("username", $username)
					->find_one();
				$user->score++;
				$user->save();
			}

		}

	}

?>