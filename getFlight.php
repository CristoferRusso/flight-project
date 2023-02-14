<?php

if (!empty($_GET['passengers'])) {
$curl = curl_init();

curl_setopt_array($curl, [
	CURLOPT_URL => "https://skyscanner44.p.rapidapi.com/search?adults=".$_GET['passengers']."&origin=".$_GET['origin']."&destination=".$_GET['destination']."&departureDate=".$_GET['departureDate']."&currency=EUR",

	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
	CURLOPT_HTTPHEADER => [
		"X-RapidAPI-Host: skyscanner44.p.rapidapi.com",
		"X-RapidAPI-Key:283da6760amsh7196cff062d99c7p125bdejsn2a096b4d01f5"
	],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);
$_SESSION['resultFlight'] = json_decode($response, true);

if ($err) {
	echo "cURL Error #:" . $err;
} else {
	//echo $response;
}
}