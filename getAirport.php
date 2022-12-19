<?php

if (!empty($_GET['city'])) {
$curl = curl_init();

curl_setopt_array($curl, [
	CURLOPT_URL => "https://skyscanner44.p.rapidapi.com/autocomplete?query=".$_GET['city'],
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
	CURLOPT_HTTPHEADER => [
		"X-RapidAPI-Host: skyscanner44.p.rapidapi.com",
		"X-RapidAPI-Key: 66481c47f8msh671a52ee382049cp17e4f5jsnf8544cb23cca"
	],
]);

$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);
$_SESSION['result'] = json_decode($response, true);
if ($err) {
	echo "cURL Error #:" . $err;
} else {
	//echo $response;
}
}
