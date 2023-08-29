
<?php

$servername = "localhost";
$DBUSERname = "root";
$DBPassword = "";
$DBname = "cinemaapplication";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$DBname", $DBUSERname, $DBPassword);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected successfully";
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

?>
