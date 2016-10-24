<!DOCTYPE html>
<html>
<head>
	<title>Ex1</title>
</head>
<body style="width:75%; margin:auto">
	<?php
		$stored_time = '2011-01-30 18:23:49';

		date_default_timezone_set('Europe/Bucharest');
		$timestamp = strtotime($stored_time);
		$ziua = date('Z');
		$local_timestamp = $timestamp + $ziua;
		$local_date = date('Y-m-d H:i:s', $local_timestamp);

		echo "Local_date : " . $local_date . "  " . $ziua . "\n";

		echo "
			<p>
				Bine ai venit la laborator 4. <br>
				azi <time>" . date("Y-m-d h:i:s a") . "</time>
			</p>
			";

		interface IParseHomework {

			public function checkTasks();

			// public function editTask();
		}

		class ParseHomework implements IParseHomework {

			private $nume;
			private $prenume;
			private $grupa;
			private $tema;
			private $materie;
			private $numTasks;
			private $scores;

			public function __construct ($input_string) {
				$input_string_array = explode(".", $input_string);
				$this->nume = $input_string_array[0];
				$this->prenume = $input_string_array[1];
				$this->grupa = $input_string_array[2];
				$this->tema = $input_string_array[3];
				$this->materie = $input_string_array[4];
				$this->scores = array();
			}

			public function __toString() {
				return "[" .$this->nume . ", " .
							$this->prenume . ", " .
							$this->grupa . ", " .
							$this->tema . ", " .
							$this->materie . "]";
			}

			public function __setNumberOfTasks() {
				$numarTema = preg_replace("/\D+/", '', $this->tema);
				$this->numTasks = rand(2, 10) / $numarTema + 1;
				$this->initScores($this->numTasks);
			}

			public function __getNumTasks() {
				return $this->numTasks;
			}

			public function __getScores() {

				$scoresToString = "";

				foreach($this->scores as $key => $value) {
					$valueToString = "[ ";
					if(!is_null($value))
						foreach($value as $valueKey => $valueValue) {
							$valueToString = $valueToString . "'" . $valueKey . "'" . "=" . $valueValue . ", ";
						}
					$valueToString = $valueToString . " ]";
				    $scoresToString = $scoresToString . "Key=" . $key . ", Value=" . $valueToString;
				    $scoresToString = $scoresToString . "<br>";
				}
				return $scoresToString;
			}

			public function checkTasks() {
				foreach ($this->scores as $index => $subArray) {
					$subArray["nota"] = rand(2, 10);
					$subArray["obs"] = $this->generateRandomString();
					$this->scores[$index] = $subArray;
				}
			}

			public function sortTasks() {
				usort($this->scores, function ($a, $b){
					return $a["nota"] - $b["nota"];
				});
			}

			private function initScores($length) {
				$this->scores = array_fill(0, $length, Null);
			}

			private function generateRandomString($length = 16) {
			    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			    $randomString = '';
			    for ($i = 0; $i < $length; $i++) {
			        $randomString .= $characters[rand(0, strlen($characters) - 1)];
			    }
			    return $randomString;
			}
		}

		$parseHomework = new ParseHomework('Chelcioiu.Ionut-Daniel.341C1.Tema1.PW.zip');
		echo "<b>var_export</b><br>";
		var_export($parseHomework);
		echo "<br>";
		echo "<b>print_r</b><br>";
		print_r($parseHomework);
		echo "<br>";
		echo "<b>var_dump</b><br>";
		var_dump($parseHomework);
		echo "<br>";
		echo "<b>normal</b><br>";
		echo $parseHomework;
		echo "<br>";
		$parseHomework->__setNumberOfTasks();
		echo "<b>Taskuri:</b> <br>"; 
		print_r($parseHomework->__getScores());
		echo  "<br>";
		echo "<b>Taskuri verificate:</b> <br>";
		$parseHomework->checkTasks();
		print_r($parseHomework->__getScores());
		echo  "<br>";
		echo "<b>Taskuri verificate sortate:</b> <br>";
		$parseHomework->sortTasks();
		print_r($parseHomework->__getScores());
		echo  "<br>";
	 ?>

	 <div style="background-color:yellow; color:green; font-weight:bold; font-size:300%; font-family:arial">
	 	<p>
	 		Number of tasks is: <?php echo $parseHomework->__getNumTasks(); ?>
	 	</p>
	 </div>
</body>
</html>