<?php
$servername = "db"; // Använd localhost eftersom du använder network_mode: bridge
$username = "mariadb";
$password = "mariadb";
$dbname = "mariadb";


try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully<br>";

    $insertSql = "INSERT INTO din_tabell (titel, uppgifter, Checkmark) VALUES ('fotboll', 'jag ska spela fotboll', false)";
    $conn->exec($insertSql);
  /*   echo "Record inserted successfully<br>";

    $selectSql = "SELECT * FROM din_tabell";
    $result = $conn->query($selectSql);

    if ($result->rowCount() > 0) {
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            echo "ID: " . $row["id"] . " - Age: " . $row["age"] . " - Name: " . $row["name"] . "<br>";
        }
    } else {
        echo "Inga resultat hittade";
    } */
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
} 

$conn = null; // Close the connection
?>
