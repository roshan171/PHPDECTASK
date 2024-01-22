<?php

$idd=$_GET['id'];
$sql= "DELETE  FROM crudddimg where id='$idd' ";

$res=$conn->query($sql);
if($res){
    echo "deleted";
}
else{
    die(mysqli_error($conn));
}


