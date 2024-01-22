<?php

$ch = curl_init();

curl_setopt($ch,CURLOPT_URL,"https://www.bigbasket.com/");
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);

$res= curl_exec($ch);
curl_close($ch);
preg_match_all("!https://www.bigbasket.com/media/uploads/p/m/[^\s]*?.jpg!",$res,$data);

// echo '<pre>';
//  print_r($data);
$finalarray = array_unique($data[0]);

foreach($finalarray as $list){
    echo "<img src='$list'/>";
}



// https://www.bigbasket.com/media/uploads/p/m/10000067_23-fresho-capsicum-green.jpg?tr=w-1920,q=80

