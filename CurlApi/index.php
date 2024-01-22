<?php

// curl : send and recerive thye data 
// Curl : client Url

echo "<pre>";
$ch = curl_init();

// $options= array(
//  CURLOPT_URL=>'https://jsonplaceholder.typicode.com/todos/',
//  CURLOPT_RETURNTRANSFER =>1
// );

// curl_setopt_array($ch,$options);


curl_setopt($ch, CURLOPT_URL,"https://jsonplaceholder.typicode.com/todos");
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
curl_exec($ch);

$response = curl_exec($ch);
curl_close($ch);

printf($response);




?>