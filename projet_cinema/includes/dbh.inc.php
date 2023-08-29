<?php

$servername = "localhost";
$DBUSERname = "root";
$DBPassword = "";
$DBname = "cinemaapplication";

$conn = mysqli_connect($servername, $DBUSERname, $DBPassword, $DBname);

if (!$conn){
    die("Connection failed: " . mysqli_connect_error());
}
