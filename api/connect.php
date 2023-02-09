<?php
$connect =mysqli_connect("localhost", "root", "" ,"users") or die ("connection failed!");

if($connect){
    echo "connected";
}
else{
    echo "not connected!!";
}
?>