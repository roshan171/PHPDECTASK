<?php



$a=3;
$b=4;


 $c=$a;
$a=$b;
$b=$c;

echo "a is $a.'' b is $b";
echo "<br>";



// without third

$a=6;
$b=7;

$a=$a+$b;
$b=$a-$b;
$a=$a-$b;

echo "a is $a.'' b is $b";