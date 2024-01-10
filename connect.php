<?php
$servername = "mariadb"; // Assuming the Docker service name for your MariaDB container
$username = "mariadb";
$password = "mariadb";
$dbname = "mariadb"; // The name of your database

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully<br>";

    // Insert a new record with age value 28
    $insertSql = "INSERT INTO din_tabell (age) VALUES (:age)";
    $stmt = $conn->prepare($insertSql);
    $stmt->bindParam(':age', $age, PDO::PARAM_INT);

    $age = 28;
    $stmt->execute();

    echo "Record inserted successfully<br>";

    // Fetch and display all records
    $selectSql = "SELECT * FROM din_tabell";
    $result = $conn->query($selectSql);

    if ($result->rowCount() > 0) {
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            echo "ID: " . $row["id"] . " - Age: " . $row["age"] . " - Namn: " . $row["namn"] . "<br>";
        }
    } else {
        echo "Inga resultat hittade";
    }
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

$conn = null; // Close the connection
?>
