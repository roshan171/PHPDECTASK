<?php

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "https://data.covid19india.org/v4/min/data.min.json");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$res = curl_exec($ch);

curl_close($ch);

// Decode JSON string
$data = json_decode($res, true);

// Encode it back to pretty-printed JSON
$prettyJson = json_encode($data, JSON_PRETTY_PRINT);

echo "<pre>";
print_r($prettyJson);
echo "</pre>";

// https://data.covid19india.org/v4/min/timeseries.min.json
	// https://data.covid19india.org/v4/min/data.min.json
?>


