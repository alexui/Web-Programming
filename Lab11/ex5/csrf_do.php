<?php

 $myfile = fopen("testfile.txt", "w");
	if(isset($_GET['test'])) {
		fwrite($myfile,$_GET['test']);
	}



?>
