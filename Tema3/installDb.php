<?php
require_once("idiorm.php");
ORM::configure('mysql:host=localhost:3388;dbname=tema3');
ORM::configure('username', 'root');
ORM::configure('password', '');
ORM::get_db()->exec(
"
DROP TABLE IF EXISTS questions;
CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(1000) NOT NULL,
  `answers` varchar(1000) NOT NULL,
  `correct` varchar(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

INSERT INTO `questions` (`id`, `question`, `answers`, `correct`) VALUES
(1, 'One kilobyte is equal to how many bytes?', 'A 1024 B 1000 C Many D 10', 'A'),
(2, 'What is the name of the main protagonist in the Legend of Zelda series of video games?', 'A Zoro B Link C Zelda D Harap Alb', 'B'),
(3, 'Who is credited with inventing the first mechanical computer?', 'A Bill Gates B Morgan Freeman C Charles Babbage D Jesus', 'C'),
(4, '1,024 Gigabytes is equal to one what?', 'A A Hard Drive B 1TB  C Cookies D Time', 'B');
"
);

ORM::get_db()->exec("DROP TABLE IF EXISTS users;");

ORM::get_db()->exec('DROP TABLE IF EXISTS messages;');

ORM::get_db()->exec('DROP TABLE IF EXISTS last_question;');

ORM::get_db()->exec(
'CREATE TABLE IF NOT EXISTS `users` (' .
	'`username` varchar(100) PRIMARY KEY, ' .
	'`password` varchar(100) NOT NULL, ' . 
	'`country` varchar(100), ' .
	'`online` int(1) DEFAULT 0, ' .
	'`score` int(11) DEFAULT 0 ' .
');'
);

ORM::get_db()->exec(
'CREATE TABLE IF NOT EXISTS `messages` (' .
	'`id` int(11) PRIMARY KEY AUTO_INCREMENT, ' .
	'`username` varchar(100) NOT NULL, ' .
	'`timestamp` datetime NOT NULL, ' . 
	'`message` varchar(1000) NOT NULL, ' .
	'`question` int(11) DEFAULT 0' .
');'
);

ORM::get_db()->exec(
'CREATE TABLE IF NOT EXISTS `last_question` (' .
	'`id` int(11) PRIMARY KEY ' .
');'
);

$last_q = ORM::for_table('last_question')->create();
$last_q->id = 0;
$last_q->save();	


echo "I installed the database";

?>