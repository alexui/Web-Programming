<?php
        $url = parse_url('http://pw/lab6/ex7/session.php');
	$host = $url['host'];
	$path = $url['path'];
	
	$fp = fsockopen($host, 80);
	// send the request headers:
	fputs($fp, "GET $path HTTP/1.1\r\n");
	fputs($fp, "Host: $host\r\n");
	fputs($fp, "Connection: close\r\n\r\n");
	
	$result = ''; 
	while(!feof($fp)) {
		// receive the results of the request
		$result .= fgets($fp, 128);
	}
	// close the socket connection:
	fclose($fp);
 
	// split the result header from the content
	$result = explode("\r\n\r\n", $result, 2);
 
	$header = isset($result[0]) ? $result[0] : '';
	$content = isset($result[1]) ? $result[1] : '';

	echo $header;
        
        $start_index = strpos($header, 'PHPSESSID=');
        $start_index += strlen('PHPSESSID=');
        $len_sessid = strpos(substr($header, $start_index), 'path');
        $len_sessid -= 1;
        $sessid = substr($header, $start_index, $len_sessid);
        
        echo '<br><br>' . $sessid . '<br><br>';
        
        
        
        
        
        $url = parse_url('http://pw/lab6/ex7/secret.php');
	$host = $url['host'];
	$path = $url['path'];
	
	$fp = fsockopen($host, 80);
	// send the request headers:
	fputs($fp, "GET $path HTTP/1.1\r\n");
	fputs($fp, "Host: $host\r\n");
	fputs($fp, "Cookie: PHPSESSID=$sessid\r\n");
	fputs($fp, "Connection: close\r\n\r\n");
	
	$result = ''; 
	while(!feof($fp)) {
		// receive the results of the request
		$result .= fgets($fp, 128);
	}
	// close the socket connection:
	fclose($fp);
 
	// split the result header from the content
	$result = explode("\r\n\r\n", $result, 2);
 
	$header = isset($result[0]) ? $result[0] : '';
	$content = isset($result[1]) ? $result[1] : '';

	echo $header;
        echo '<br><br>';
        echo $content;
?>