<!-- Curl :- How to download a file a remote site using curl -->


<?php

$filename = fopen("file.html",'w');
$ch= curl_init();


$options=array(
 CURLOPT_URL=>'https://jsonplaceholder.typicode.com/todos',
 CURLOPT_RETURNTRANSFER=>1,
 CURLOPT_FILE=> $filename
);





curl_setopt_array($ch,$options);

curl_exec($ch);

curl_close($ch);