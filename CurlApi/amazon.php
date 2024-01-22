<?php
// create curl resource
$curl= curl_init();
$string_name= "php books";

$url= "https://www.amazon.in/s/field-keywords=$string_name";


//  Set Curl options
 curl_setopt($curl,CURLOPT_URL,$url);
curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,false);
curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);

$result= curl_exec($curl);
preg_match_all("https://m.media-amazon.com/images/I/[^\s]*?._AC_UY327_FMwebp_QL65_.jpg",$result,$matches);

print_r($matches);

// execute http request
// curl_exec($curl);

// close connection
curl_close($curl);








?>



