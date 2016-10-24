<?php
$http_response = '';

$fp = fsockopen('localhost', 80);

fputs($fp, "GET /pw/lab6/ex3/script1.php?key1=value1&key2=value2 HTTP/1.1\r\n");
fputs($fp, "Host: localhost\r\n\r\n");

while (!feof($fp))
{
    $http_response .= fgets($fp, 128);
}
fclose($fp);

echo nl2br(htmlentities($http_response));