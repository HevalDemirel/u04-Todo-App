<?php
$servername = "localhost";
$username = "root";
$password = Ensamvarg1;
$dbname = "din-databas";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
