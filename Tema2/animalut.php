<?php 

	include "timp.php";

	require_once 'idiorm.php';
	ORM::configure('sqlite:TamagotchiDB.sqlite');

	class Animalut {

		const PETS = 'animalute';
		const STATS = 'caracteristici';
		const ACTIONS = 'actiuni';

		const ID = 'id';
		const TYPE = 'tip';
		const NAME = 'nume';

		const HEIGHT = 'inaltime';
		const WEIGHT = 'greutate';
		const AGE = 'varsta';
		const HEALTH = 'sanatate';
		const HUNGER = 'foame';
		const THIRST = 'sete';
		const SLEEP = 'somn';
		const BLADDER = 'vezica';
		const TOILET = 'toaleta';
		const FUN = 'distractie';
		const JOY = 'fericire';
		const LIFE = 'viata';

		const EAT = 'Hraneste';
		const DRINK = 'Bea';
		const NAP = 'Culca';
		const WAKE = 'Trezeste';
		const WCT = 'WC-T';
		const WCV = 'WC-V';
		const BATH = 'Baie';
		const INJ = 'Injectie';
		const WORK = 'Antrenament';
		const PLAY = "Joaca";

		const WORKING = 2;
		const AWAKE = 1;
		const SLEEPING = 0;

		const HOUR = 3600;
		const DAY = 86400;

		private $id;
		private $type;
		private $name;
		private $timestamp_hour;
		private $timestamp_day;
		private $timestamp_sad;
		private $timestamp_inactive;
		private $active;

		private $height;
		private $weight;
		private $age;
		private $health;
		private $hunger;
		private $thirst;
		private $sleep;
		private $bladder;
		private $toilet;
		private $fun;
		private $joy;
		private $life;

		public function __construct($id = NULL) {
	        $this->id = $id;

	        ORM::configure('id_column_overrides', 
	        	array('caracteristici' => array('id_animalut', 'atribut')));
	    }

	    public static function create_info_table_if_not_exists () {

			try {
				ORM::get_db()->exec(
					'CREATE TABLE IF NOT EXISTS animalute (' .
						'id INTEGER PRIMARY KEY AUTOINCREMENT, ' .
						'tip TEXT NOT NULL, ' .
						'nume TEXT DEFAULT "Fara nume", ' .
						'timestamp_hour INTEGER NOT NULL, ' .
						'timestamp_day INTEGER NOT NULL, ' .
						'timestamp_inactive INTEGER DEFAULT 0, ' .
						'timestamp_sad INTEGER DEFAULT 0, ' .
						'activ INTEGER NOT NULL' .
					');'
				);			
			} catch (Exception $e) {
			    echo 'Caught exception: CREATE TABLE animalute ' . $e->getMessage() . '.<br>';
			}
		}

	    public static function create_actions_table_if_not_exists () {

	    	try {
				ORM::get_db()->exec(
					'CREATE TABLE IF NOT EXISTS actiuni (' .
						'nume_actiune TEXT NOT NULL, ' .
						'atribut TEXT NOT NULL, ' .
						'modificare DECIMAL(5,2) NOT NULL, ' .
						'factor_modificare VARCHAR(1) NOT NULL ' .
						'CHECK(factor_modificare IN ("H", "A"))' .
					');'
				);
			} catch (Exception $e) {
			    echo 'Caught exception: CREATE TABLE actiuni ' . $e->getMessage() . '.<br>';
			}
	    }

	    public static function insert_into_actions_if_empty () {

			$result = ORM::for_table('actiuni')->find_one();
			if (!$result) {
				
				self::insert_action_info(self::EAT, self::WEIGHT, 10, "A");
				self::insert_action_info(self::EAT, self::HUNGER, -20, "A");
				self::insert_action_info(self::EAT, self::TOILET, 33, "A");

				self::insert_action_info(self::DRINK, self::WEIGHT, 10, "A");
				self::insert_action_info(self::DRINK, self::THIRST, -40, "A");
				self::insert_action_info(self::DRINK, self::BLADDER, 25, "A");
				
				self::insert_action_info(self::NAP, self::SLEEP, -15, "H");
				self::insert_action_info(self::NAP, self::WEIGHT, 0.5, "H");
				self::insert_action_info(self::NAP, self::HEALTH, 2, "H");

				self::insert_action_info(self::WCT, self::TOILET, -100, "A");
				self::insert_action_info(self::WCT, self::WEIGHT, -30, "A");

				self::insert_action_info(self::WCV, self::BLADDER, -100, "A");
				self::insert_action_info(self::WCV, self::WEIGHT, -15, "A");

				self::insert_action_info(self::BATH, self::HEALTH, 5, "A");

				self::insert_action_info(self::INJ, self::HEALTH, 10, "A");
				self::insert_action_info(self::INJ, self::FUN, -10, "A");

				self::insert_action_info(self::PLAY, self::FUN, 20, "A");

				self::insert_action_info(self::WORK, self::WEIGHT, -3, "H");
				self::insert_action_info(self::WORK, self::HEALTH, 10, "H");
				self::insert_action_info(self::WORK, self::FUN, -10, "H");
			}
	    }

	    public static function create_happiness_table_if_not_exists () {

	    	try {
				ORM::get_db()->exec(
					'CREATE TABLE IF NOT EXISTS fericire (' .
						'atribut TEXT NOT NULL, ' .
						'unitate_masura TEXT NOT NULL, ' .
						'limita_inferioara INT NOT NULL, ' .
						'limita_superioara INT NOT NULL ' .
					');'
				);
			} catch (Exception $e) {
			    echo 'Caught exception: CREATE TABLE fericire ' . $e->getMessage() . '.<br>';
			}
	    }

		public static function insert_into_happiness_if_empty () {

			$result = ORM::for_table('fericire')->find_one();
			if (!$result) {

				self::insert_happiness_info(self::WEIGHT, "g", 400, 700);
				self::insert_happiness_info(self::HEALTH, "%", 70, 100);
				self::insert_happiness_info(self::HUNGER, "%", 0, 50);
				self::insert_happiness_info(self::THIRST, "%", 0, 30);
				self::insert_happiness_info(self::SLEEP, "%", 0, 60);
				self::insert_happiness_info(self::BLADDER, "%", 0, 70);
				self::insert_happiness_info(self::TOILET, "%", 0, 80);
				self::insert_happiness_info(self::FUN, "%", 30, 100);
			}
		}

		public static function create_stats_table_if_not_exists () {
			try {

				ORM::get_db()->exec(
					'CREATE TABLE IF NOT EXISTS caracteristici (' .
						'id_animalut INT, ' .
						'atribut TEXT, ' .
						'valoare DECIMAL(5,2) NOT NULL, ' .
						'unitate_masura TEXT NOT NULL, ' .
						'valoare_modificare INT, ' .
						'rata_modificare VARCHAR(1) CHECK(rata_modificare IN ("H", "Z")), ' .
						'FOREIGN KEY(id_animalut) REFERENCES animalute(id) ' .
					');'
				);
				
			} catch (Exception $e) {
			    echo 'Caught exception: CREATE TABLE caracteristici ' . $e->getMessage() . '.<br>';
			}
		}

		private static function insert_action_info ($action_name, $status_name, $value,
			$value_change_factor) {

			$action = ORM::for_table('actiuni')->create();
	        $action->nume_actiune = $action_name;
	        $action->atribut = $status_name;
	        $action->modificare = $value;
	        $action->factor_modificare = $value_change_factor;
	        $action->save();
	        return $action;
		}

		private static function insert_happiness_info ($status_name, $measure_unit,
			$left_limit, $right_limit) {

			$status = ORM::for_table('fericire')->create();
	        $status->atribut = $status_name;
	        $status->unitate_masura = $measure_unit;
	        $status->limita_inferioara = $left_limit;
	        $status->limita_superioara = $right_limit;
	        $status->save();
	        return $status;
		}

		public function insert_pet_info($type, $name) {

	    	$animalut = ORM::for_table(self::PETS)->where(array(self::TYPE => $type, self::NAME => $name))->find_one();

	    	if (!$animalut) {
	    		try {
		    		$animalut = ORM::for_table(self::PETS)->create();
			    	$animalut->nume = $name;
			    	$animalut->tip = $type;
			    	$animalut->timestamp_hour = Timp::get_time();
			    	$animalut->timestamp_day = $animalut->timestamp_hour;
			    	$animalut->activ = self::AWAKE;
			    	$animalut->save();

			    } catch (Exception $e) {
				    echo 'Caught exception: INSERT INTO animalute - CONSTRAINT VIOLATED<br>';
				}
		    	    	
		    	$animalut = ORM::for_table(self::PETS)->where(array(self::TYPE => $type, self::NAME => $name))->find_one();
	    	}

	    	$this->id = $animalut->id;
	    	$this->insert_into_stats_if_empty();

	    	return $this->id;
		}

		public function load_pet_info () {

			$pet_info = ORM::for_table(self::PETS)->where(self::ID, $this->id)->find_one();

			if (!$pet_info)
				return false;

			$this->name = $pet_info->nume;
			$this->type = $pet_info->tip;
			$this->timestamp_hour = $pet_info->timestamp_hour;
			$this->timestamp_day = $pet_info->timestamp_day;
			$this->timestamp_sad = $pet_info->timestamp_sad;
			$this->timestamp_inactive = $pet_info->timestamp_inactive;
			$this->active = $pet_info->activ;

			$life_info = ORM::for_table(self::STATS)
				->where(array('id_animalut' => $this->id, 'atribut' => self::LIFE))
				->find_one();

			$this->life = $life_info->valoare;

			return true;
		}

		public function check_hourly_update () {

			if (!$this->is_alive())
				return;

			$present_time = Timp::get_time();

			$time_elapsed = $present_time - $this->timestamp_hour;
			$hours = intval($time_elapsed / self::HOUR);

			$time_elapsed = $present_time - $this->timestamp_day;
			$days = intval($time_elapsed / self::DAY);

			if ($hours) {
				
				$stats = ORM::for_table(self::STATS)
					->where('id_animalut', $this->id)
					->where_not_null('rata_modificare')
					->find_many();

				foreach ($stats as $row) {
					$value = $row->valoare;
					$update_value = $row->valoare_modificare;

					if ($row->rata_modificare == "H") {
						$value = $value + ($update_value * $hours);
						if ($row->unitate_masura == "%") {
							if ($value > 100)
								$value = 100;
							if ($value < 0)
								$value = 0;
						}
					}

					if ($row->rata_modificare == "Z") {
						if ($days) {
							$value = $value + ($update_value * $days);
							if ($row->unitate_masura == "%") {
								if ($value > 100)
									$value = 100;
								if ($value < 0)
									$value = 0;
							}
						}
					}

					$row->valoare = $value;
					$row->save();
				}

				$this->timestamp_hour = $this->timestamp_hour + ($hours * self::HOUR);

				if ($days) {
					$this->timestamp_day = $this->timestamp_day + ($days * self::DAY);
				}
			}
		}

		public function check_happiness () {

			$this->load_stats();

			$status = ORM::for_table(self::STATS)
				->where(array('id_animalut' => $this->id, 'atribut' => self::JOY))
				->find_one();

			$joy_status = ORM::for_table('fericire')->find_many();

			$happy = true;
			foreach ($joy_status as $row) {
				$status_name = $row->atribut;
				$left_limit = $row->limita_inferioara;
				$right_limit = $row->limita_superioara;

				switch ($status_name) {
					case self::HEIGHT:
						$status_value = $this->height;
						break;
					case self::WEIGHT:
						$status_value = $this->weight;
						break;
					case self::AGE:
						$status_value = $this->age;
						break;
					case self::HEALTH:
						$status_value = $this->health;
						break;
					case self::HUNGER:
						$status_value = $this->hunger;
						break;
					case self::THIRST:
						$status_value = $this->thirst;
						break;
					case self::SLEEP:
						$status_value = $this->sleep;
						break;
					case self::BLADDER:
						$status_value = $this->bladder;
						break;
					case self::TOILET:
						$status_value = $this->toilet;
						break;
					case self::FUN:
						$status_value = $this->fun;
						break;
				}

				if ($status_value < $left_limit || $status_value > $right_limit) {
					$happy = false;
					break;
				}
			}

			if ($happy) {
		       $status->valoare = true;
		       $status->save();
		       $this->timestamp_sad = 0;
			}
			else {
				if ($status->valoare == true) {
					$status->valoare = false;
			        $status->save();
			        $this->timestamp_sad = Timp::get_time();
			    }
			    else {
			    	$time_elapsed = Timp::get_time() - $this->timestamp_sad;
			    	if ($time_elapsed > 3 * self::DAY)
			    		$this->destroy_pet();
			    }
			}
		}

		public function update_pet_info () {

			$pet_info = ORM::for_table(self::PETS)->where(self::ID, $this->id)->find_one();
			$pet_info->timestamp_hour = $this->timestamp_hour;
			$pet_info->timestamp_day = $this->timestamp_day;
			$pet_info->timestamp_sad = $this->timestamp_sad;
			$pet_info->timestamp_inactive = $this->timestamp_inactive;
			$pet_info->activ = $this->active;
			$pet_info->save();
		}

		private function update_stats_for_action ($action_name, $hours = 1) {
			
			$stats = ORM::for_table(self::STATS)
						->table_alias('a')
						->join(self::ACTIONS, ' a.atribut = b.atribut' , 'b')
						->where(array('b.nume_actiune' => $action_name, 'a.id_animalut' => $this->id))
						->find_many();

			foreach ($stats as $row) {
				$status_name = $row->atribut;
				$update_value = $row->modificare * $hours;
				$value_change_factor = $row->factor_modificare;

				switch ($status_name) {
					case self::HEIGHT:
						$this->height = $row->valoare;
						$row->valoare = $this->update_height($update_value, $value_change_factor);
						break;
					case self::WEIGHT:
						$this->weight = $row->valoare;
						$row->valoare = $this->update_weight($update_value, $value_change_factor);
						break;
					case self::AGE:
						$this->age = $row->valoare;
						$row->valoare = $this->update_age($update_value, $value_change_factor);
						break;
					case self::HEALTH:
						$this->health = $row->valoare;
						$row->valoare = $this->update_health($update_value, $value_change_factor);
						break;
					case self::HUNGER:
						$this->hunger = $row->valoare;
						$row->valoare = $this->update_hunger($update_value, $value_change_factor);
						break;
					case self::THIRST:
						$this->thirst = $row->valoare;
						$row->valoare = $this->update_thirst($update_value, $value_change_factor);
						break;
					case self::SLEEP:
						$this->sleep = $row->valoare;
						$row->valoare = $this->update_sleep($update_value, $value_change_factor);
						break;
					case self::BLADDER:
						$this->bladder = $row->valoare;
						$row->valoare = $this->update_bladder($update_value, $value_change_factor);
						break;
					case self::TOILET:
						$this->toilet = $row->valoare;
						$row->valoare = $this->update_toilet($update_value, $value_change_factor);
						break;
					case self::FUN:
						$this->fun = $row->valoare;
						$row->valoare = $this->update_fun($update_value, $value_change_factor);
						break;
					case self::JOY:
						$this->joy = $row->valoare;
						$row->valoare = $this->update_joy($update_value, $value_change_factor);
						break;
					case self::LIFE:
						$this->life = $row->valoare;
						$row->valoare = $this->update_life($update_value, $value_change_factor);
						break;
				}

				$row->save();
			}
		}

		public function get_json_from_stats () {

			$this->load_stats();

			$stats_array = array (
					self::NAME => $this->name,
					self::HEIGHT => $this->height,
					self::WEIGHT => $this->weight,
					self::AGE => $this->age,
					self::HEALTH => $this->health,
					self::HUNGER => $this->hunger,
					self::THIRST => $this->thirst,
					self::SLEEP => $this->sleep,
					self::BLADDER => $this->bladder,
					self::TOILET => $this->toilet,
					self::FUN => $this->fun,
					self::JOY => $this->joy,
					self::LIFE => $this->life
				);

			return json_encode($stats_array);
		}

		private function update_height ($update_value, $value_change_factor) {

			$this->height += $update_value;
			if ($this->height < 0)
				$this->weight = 0;

			return $this->height;
		}

		private function update_weight ($update_value, $value_change_factor) {

			$this->weight += $update_value;
			if ($this->weight < 0)
				$this->weight = 0;
			
			return $this->weight;
		}

		private function update_age ($update_value, $value_change_factor) {

			$this->age += $update_value;
			if ($this->age < 0)
				$this->age = 0;

			return $this->age;
		}

		private function update_health ($update_value, $value_change_factor) {

			$this->health += $update_value;
			if ($this->health < 0)
				$this->health = 0;
			if ($this->health > 100)
				$this->health = 100;

			return $this->health;
		}

		private function update_hunger ($update_value, $value_change_factor) {

			$this->hunger += $update_value;
			if ($this->hunger < 0)
				$this->hunger = 0;
			if ($this->hunger > 100)
				$this->hunger = 100;

			return $this->hunger;
		}

		private function update_thirst ($update_value, $value_change_factor) {

			$this->thirst += $update_value;
			if ($this->thirst < 0)
				$this->thirst = 0;
			if ($this->thirst > 100)
				$this->thirst = 100;

			return $this->thirst;
		}

		private function update_sleep ($update_value, $value_change_factor) {

			$this->sleep += $update_value;
			if ($this->sleep < 0)
				$this->sleep = 0;
			if ($this->sleep > 100)
				$this->sleep = 100;

			return $this->sleep;
		}

		private function update_bladder ($update_value, $value_change_factor) {

			$this->bladder += $update_value;
			if ($this->bladder < 0)
				$this->bladder = 0;
			if ($this->bladder > 100)
				$this->bladder = 100;

			return $this->bladder;
		}

		private function update_toilet ($update_value, $value_change_factor) {

			$this->toilet += $update_value;
			if ($this->toilet < 0)
				$this->toilet = 0;
			if ($this->toilet > 100)
				$this->toilet = 100;

			return $this->toilet;
		}

		private function update_fun ($update_value, $value_change_factor) {

			$this->fun += $update_value;
			if ($this->fun < 0)
				$this->fun = 0;
			if ($this->fun > 100)
				$this->fun = 100;

			return $this->fun;
		}

		private function is_awake () {
			return ($this->active == self::AWAKE);
		}

		private function is_sleeping () {
			return ($this->active == self::SLEEPING);
		}

		private function is_working () {
			return ($this->active == self::WORKING);
		}

		private function is_alive() {
			return $this->life;
		}

		public function eat() {
			if ($this->is_alive() && $this->is_awake())
				$this->update_stats_for_action(self::EAT);
		}

		public function drink() {
			if ($this->is_alive() && $this->is_awake())
				$this->update_stats_for_action(self::DRINK);
		}

		public function sleep() {
			if ($this->is_alive() && $this->is_awake()) {
				$this->active = self::SLEEPING;
				$this->timestamp_inactive = Timp::get_time();
			}
		}

		public function work() {
			if ($this->is_alive() && $this->is_awake()) {
				$this->active = self::WORKING;
				$this->timestamp_inactive = Timp::get_time();
			}
		}

		public function wct() {
			if ($this->is_alive() && $this->is_awake())
				$this->update_stats_for_action(self::WCT);
		}

		public function wcv() {
			if ($this->is_alive() && $this->is_awake())
				$this->update_stats_for_action(self::WCV);
		}

		public function injection() {
			if ($this->is_alive() && $this->is_awake())
				$this->update_stats_for_action(self::INJ);
		}

		public function play() {
			if ($this->is_alive() && $this->is_awake())
				$this->update_stats_for_action(self::PLAY);
		}

		public function bath() {
			if ($this->is_alive() && $this->is_awake())
				$this->update_stats_for_action(self::BATH);
		}

		public function wake() {
				
			if ($this->is_alive() && $this->is_sleeping()) {
				if ($this->active == self::SLEEPING) {
					$hours_elapsed = $this->get_hours_elapsed();
					$this->update_stats_for_action(self::NAP, $hours_elapsed);
				
					$this->timestamp_inactive = 0;
					$this->active = self::AWAKE;
				}
			}
		}

		public function relax() {

			if ($this->is_alive() && $this->is_working()) {
				if ($this->active == self::WORKING) {
					$hours_elapsed = $this->get_hours_elapsed();
					$this->update_stats_for_action(self::WORK, $hours_elapsed);
				
					$this->timestamp_inactive = 0;
					$this->active = self::AWAKE;
				}
			}

		}

		private function load_stats () {

			$stats = ORM::for_table(self::STATS)
						->where('id_animalut', $this->id)
						->find_many();

			foreach ($stats as $row) {
				$status_name = $row->atribut;

				switch ($status_name) {
					case self::HEIGHT:
						$this->height = $row->valoare;
						break;
					case self::WEIGHT:
						$this->weight = $row->valoare;
						break;
					case self::AGE:
						$this->age = $row->valoare;
						break;
					case self::HEALTH:
						$this->health = $row->valoare;
						break;
					case self::HUNGER:
						$this->hunger = $row->valoare;
						break;
					case self::THIRST:
						$this->thirst = $row->valoare;
						break;
					case self::SLEEP:
						$this->sleep = $row->valoare;
						break;
					case self::BLADDER:
						$this->bladder = $row->valoare;
						break;
					case self::TOILET:
						$this->toilet = $row->valoare;
						break;
					case self::FUN:
						$this->fun = $row->valoare;
						break;
					case self::JOY:
						$this->joy = $row->valoare;
						break;
					case self::LIFE:
						$this->life = $row->valoare;
						break;
				}
			}
		}

		private function insert_status_info ($pet_id, $status_name, $value, $measure_unit,
			$value_change_unit = NULL, $value_change_rate = NULL) {

			$status = ORM::for_table(self::STATS)->create();
			$status->id_animalut = $pet_id;
	        $status->atribut = $status_name;
	        $status->valoare = $value;
	        $status->unitate_masura = $measure_unit;
	        $status->valoare_modificare = $value_change_unit;
	        $status->rata_modificare = $value_change_rate;
	        $status->save();
	        return $status;
		}

		private function insert_into_stats_if_empty () {

			$result = ORM::for_table(self::STATS)
						->where('id_animalut', $this->id)->find_one();

			if (!$result) {
				$this->insert_status_info($this->id, self::HEIGHT, 5, "cm", 1, "Z");
			    $this->insert_status_info($this->id, self::WEIGHT, 500, "g");
			    $this->insert_status_info($this->id, self::AGE, 0, "ani", 1, "Z");
			    $this->insert_status_info($this->id, self::HEALTH, 100, "%", -1, "H");
			    $this->insert_status_info($this->id, self::HUNGER, 10, "%", 5, "H");
			    $this->insert_status_info($this->id, self::THIRST, 5, "%", 20, "H");
			    $this->insert_status_info($this->id, self::SLEEP, 50, "%", 5, "H");
			    $this->insert_status_info($this->id, self::BLADDER, 0, "%");
			    $this->insert_status_info($this->id, self::TOILET, 0, "%");
			    $this->insert_status_info($this->id, self::FUN, 30, "%", -2, "H");
			    $this->insert_status_info($this->id, self::JOY, 1, "boolean");
			    $this->insert_status_info($this->id, self::LIFE, 1, "boolean");
			}
	    }

	    private function get_hours_elapsed () {

	    	$time = Timp::get_time() - $this->timestamp_inactive;
	    	return intval($time / self::HOUR);
	    }

	    private function destroy_pet () {

	    	$status = ORM::for_table(self::STATS)
	    		->where(array('id_animalut' => $this->id, 'atribut' => self::LIFE))
	    		->find_one();
	    	if ($status->valoare != 0) {
		    	$status->valoare = 0;
		    	$status->save();
		    }
	    }
	
	}

?>