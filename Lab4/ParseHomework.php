<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ParseHomework
 *
 * @author Florina
 */
class ParseHomework {
    private $nume;
    private $prenume;
    private $grupa;
    private $tema;
    private $materie;
    private $numarTaskuri;
    private $scores;
    
    function __construct($archieve) {
        list($this->nume, $this->prenume, $this->grupa, 
                $this->tema, $this->materie) = explode(".", $archieve);
        $this->scores = array(); 
        echo $this->nume . "<br>";
        echo $this->prenume . "<br>";
        echo $this->grupa . "<br>";
        echo $this->tema . "<br>";
        echo $this->materie . "<br>";
    }
    
    function __toString() {
        return '[' . $this->nume . ',' . $this->prenume . ',' 
                . $this->grupa . ',' . $this->tema. ',' . $this->materie . ']'
                . "<br>";
    }
    
    function setNumberOfTasks() {
        $numarTema = preg_replace("/[^0-9]/","",$this->tema);
        $this->numarTaskuri = rand(2, 10)/intval($numarTema) + 1;
        echo "The number of tasks is " . $this->numarTaskuri . "<br> <br>";
    }

    function __getScores() {
        return $this->scores;
    }
    
    function initScore() {
//        $keys = array('nota', 'obs');
//        for($i = 0; $i < $this->numarTaskuri; $i++) {
//            $scores = array($i => rand(1, 10));
//            echo $i . ' => ' . $scores[$i] . "<br>";    
//        }
        $this->scores = array_fill(0, $this->numarTaskuri, array());
        print_r($this->scores);
        echo "<br>";
    }
    
    function generateRandomString($length = 16) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomString;
    }

    function checkTasks() {
       for($i = 0; $i < $this->numarTaskuri; $i++) {
           $this->scores[$i] = array('nota' => rand(1, 10), 
               'obs' => $this->generateRandomString());
           echo "$i " . " => " . "[ " . "nota" . " => " . 
                   $this->scores[$i]['nota'] . ', ' . "obs" . " => " . 
                   $this->scores[$i]['obs'] . " ]" . "<br>";
       }
    }
    
    function sortNotes($notes) {
        for($i = 0; $i < count($notes); $i++) {
            for($j = $i + 1; $j < count($notes); $j++) {
                if($notes[$i] > $notes[$j]) {
                    $aux = $notes[$i];
                    $notes[$i] = $notes[$j];
                    $notes[$j] = $aux;
                }
            }
        }
//        print_r($notes);
    }
            
    function sortTasks() {
        echo $this->numarTaskuri;
        for($i = 0; $i < $this->numarTaskuri; $i++) {
//            if(isset($this->scores[$i]['nota'])) {
                print_r($this->scores[$i]);
                echo $this->scores[$i]['nota'];
//            }
        }
    }
}

echo "======= Ex2 ========" . "<br>";
$homework = new ParseHomework("Chelcioiu.Ionut-Daniel.341C1.Tema1.PW.zip");
echo "======= Ex3 ========" . "<br>";
echo $homework . "<br>";
echo "======= Ex4 ========" . "<br>";
$homework->setNumberOfTasks();
echo "======= Ex5 ========" . "<br>";
$homework->initScore();
echo "======= Ex6 ========" . "<br>";
$homework->checkTasks();
print_r($homework->__getScores());
// echo "<br>";
// echo "======= Ex7 ========" . "<br>";
// $notes = [5, 9, 1, 7];
// $homework->sortNotes($notes);
// echo "<br><br>";
// $homework->sortTasks();
