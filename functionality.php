<?php
include "connect.php"; 
$sql = "SELECT * FROM din_tabell";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"]. " - Namn: " . $row["namn"]. "<br>";
    }
} else {
    echo "Inga resultat hittade";
}


$conn->close();
?>
