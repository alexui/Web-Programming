<?php 

	require_once 'idiorm.php';
	ORM::configure('sqlite:TamagotchiDB.sqlite');

	class Timp {

		const TIME = 'timp';
		const HOUR = 3600;
		const DAY = 86400;

		private static $start_up_time;
		private static $forward_time;

		public static function create_time_table_if_not_exists () {
			try {
				ORM::get_db()->exec(
					'CREATE TABLE IF NOT EXISTS timp (' .
						'id INTEGER PRIMARY KEY AUTOINCREMENT, ' .
						'start_up_time INTEGER NOT NULL, ' .
						'forward_time INTEGER NOT NULL ' .
					');'
				);			
			} catch (Exception $e) {
			    echo 'Caught exception: CREATE TABLE timp ' . $e->getMessage() . '.<br>';
			}
		}

		public static function get_time () {

			$timp = ORM::for_table(self::TIME)->find_one();

			if (!$timp) {

				self::$start_up_time = time();
				self::$forward_time = 0;

				$timp = ORM::for_table(self::TIME)->create();
		        $timp->start_up_time = self::$start_up_time;
		        $timp->forward_time = self::$forward_time;
		        $timp->save();
			}
			else {
				$timp = ORM::for_table(self::TIME)->find_one();
		     	self::$start_up_time = $timp->start_up_time;
		     	self::$forward_time = $timp->forward_time;
			}

			$time = time() - self::$start_up_time + self::$forward_time * self::HOUR;
			return $time;
		}

		public static function forward_hour () {
			$timp = ORM::for_table(self::TIME)->find_one();
			$forward_time = $timp->forward_time; 
			$timp->forward_time = $forward_time + 1;
			$timp->save();
		}

		public static function forward_day () {
			$timp = ORM::for_table(self::TIME)->find_one();
			$forward_time = $timp->forward_time; 
			$timp->forward_time = $forward_time + 24;
			$timp->save();
		}

		public static function get_current_day () {
			$time = self::get_time();
			return intval($time / self::DAY);
		}

		public static function get_current_hour () {
			$time = self::get_time();
			return intval($time / self::HOUR);
		}
	}

?>