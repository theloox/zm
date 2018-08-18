<?php

define("UHELLO", "http://localhost/hello");
define("UWORLD", "http://localhost/world");



	//validate json
	
	$body = file_get_contents('php://input');

	if ($_SERVER['CONTENT_TYPE'] != 'application/json') {
		header('HTTP/1.0 400 Bad Request', true, 400);
		echo "Bad Request\n";
		exit(0);
	}

	//another validation
	$j = json_decode($body);
        if ($j === null) {
                header('HTTP/1.0 400 Bad Request', true, 400);
                echo "Bad Request\n";
                exit(0);
        }


	header("Content-Type: application/json");

	$u = curl_init();

	curl_setopt($u, CURLOPT_URL, UHELLO);
	curl_setopt($u, CURLOPT_RETURNTRANSFER, true);

	$h = curl_exec($u);


	curl_setopt($u, CURLOPT_URL, UWORLD);

	$w = curl_exec($u);

	echo "{\"message\": \"$h $w!!!\", \"parameters\": " . json_encode($j) . " }\n";

?>
