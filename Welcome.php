<?php

session_start();

include "connect.php";

$name = "Guest";
$email = "N/A";


if (isset($_SESSION['userId'])) {
   
    $userId = $_SESSION['userId'];

    $stmt = $conn->prepare("SELECT name, email FROM users WHERE id = ?");
    $stmt->bind_param("i", $userId); 
    $stmt->execute(); 
    $result = $stmt->get_result(); 

   
    if ($result->num_rows > 0) {
      
        $user = $result->fetch_assoc();
        $name = $user['name'];
        $email = $user['email'];
    } else {
        echo "Användaren hittades inte i databasen.";
        unset($_SESSION['userId']);
    }

    $stmt->close();
} else {
    echo "Användar-ID är inte satt i sessionen.";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Välkomstsida</title>
</head>

<body>
    <h1>Välkommen <?php echo htmlspecialchars($name, ENT_QUOTES, 'UTF-8'); ?></h1>
    <p>Din e-postadress är: <?php echo htmlspecialchars($email, ENT_QUOTES, 'UTF-8'); ?></p>

    <a href="Uppgiftsidan.php">
        <button>Klicka här för att se alla uppgifter</button>
    </a>
</body>

</html>