<?php
$dbServername = "192.168.1.22";
$dbUsername = "root";
$dbPassword = "";
$dbName = "denemedb";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

if(!$conn){
    die("Connection failed: ".mysqli_connect_error());
}