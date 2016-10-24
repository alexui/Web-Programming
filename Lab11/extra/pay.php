<?php  
	
	session_start();

	if (isset($_GET['account']) && isset($_GET['amount']) && isset($_GET['for'])) {

		$account = $_GET['account'];
		$amount = $_GET['amount'];
		$for = $_GET['for'];

	// $account = "ii";
	// $amount = "aa";
	// $for = "bb";

		$payments_file = fopen("pay.txt", "w");
		fwrite($payments_file, $amount . " from " . $account . "\n");
		fclose($payments_file);
	}

?>