<?php

$connect = mysqli_connect("localhost", "root", "", "Voting") or die("connection failed");

if($connect){
    echo "Connection Successful!";
}
else{
    echo "Connection Failed!";
}
?>