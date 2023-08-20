<?php
$serverName="localhost";
$dbUserName ="root";
$dbPassword = "";
$dbName="myschool";

$conn = mysqli_connect($serverName,$dbUserName,$dbPassword,$dbName);
if(!$conn){
 die("Connection failed :" .mysqlI_connect_error());
}