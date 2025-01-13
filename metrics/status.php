<?php

$sock = stream_socket_client("unix://".getenv("control_socket"), $errno, $errst);
fwrite($sock, "GET /status HTTP/1.0\r\n\r\n");
$resp = fread($sock, 4096);
fclose($sock);

list($headers, $body) = explode("\r\n\r\n", $resp, 2);

header("Content-Type: application/json");
echo $body;
