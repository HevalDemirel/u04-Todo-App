<?php
// Starta en sessionshantering för att spåra användarsessioner
session_start();

// Inkludera en fil (connect.php) som antagligen innehåller anslutningsinformation till databasen
include "connect.php";

// Initialisera variabler för användarnamn och e-postadress med standardvärden
$name = "Guest";
$email = "N/A";

// Kontrollera om användar-ID är satt i sessionen
if (isset($_SESSION['userId'])) {
    // Hämta användar-ID från sessionen
    $userId = $_SESSION['userId'];

    // Förbered en SQL-fråga för att hämta användarinformation från databasen baserat på användar-ID
    $stmt = $conn->prepare("SELECT name, email FROM users WHERE id = ?");
    $stmt->bind_param("i", $userId); // Binda användar-ID till förberedd fråga
    $stmt->execute(); // Utför SQL-frågan
    $result = $stmt->get_result(); // Hämta resultatet av frågan

    // Kontrollera om det finns några rader i resultatet
    if ($result->num_rows > 0) {
        // Hämta användarinformation från resultatet
        $user = $result->fetch_assoc();
        $name = $user['name'];
        $email = $user['email'];
    } else {
        // Om ingen användare hittades i databasen, meddela användaren och avsluta sessionen
        echo "Användaren hittades inte i databasen.";
        // Det kan vara klokt att avsätta användar-ID från sessionen om det är ogiltigt
        unset($_SESSION['userId']);
    }

    // Stäng förberedd fråga
    $stmt->close();
} else {
    // Om användar-ID inte är satt i sessionen, meddela användaren
    echo "Användar-ID är inte satt i sessionen.";
}

// Stäng anslutningen till databasen
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
    <!-- Visa välkomstmeddelande och användarinformation på HTML-sidan -->
    <h1>Välkommen <?php echo htmlspecialchars($name, ENT_QUOTES, 'UTF-8'); ?></h1>
    <p>Din e-postadress är: <?php echo htmlspecialchars($email, ENT_QUOTES, 'UTF-8'); ?></p>

    <!-- Länk till en annan sida (uppgiftsidan.php) -->
    <a href="Uppgiftsidan.php">
        <button>Klicka här för att se alla uppgifter</button>
    </a>
</body>

</html>