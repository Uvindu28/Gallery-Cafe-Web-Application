<?php

$serverName ="localhost";
$dbUserName ="root";
$dbPssword ="";
$dbName ="crud";

$conn = mysqli_connect($serverName, $dbUserName, $dbPssword, $dbName);



if(!$conn){
    die("Connection Failed : " .mysqli_connect_error());
}