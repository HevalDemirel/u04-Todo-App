<?php
session_start();

include "connect.php";

function registerUser($conn, $name, $email, $password)
{
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    $stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (:name, :email, :password)");
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $hashedPassword);
    $stmt->execute();
}

function loginUser($conn, $email, $password)
{
    $stmt = $conn->prepare("SELECT id, password FROM users WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        $hashedPassword = $result['password'];
        if (password_verify($password, $hashedPassword)) {
            return $result['id'];
        }
    }

    return false;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['register'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        registerUser($conn, $name, $email, $password);
        echo "Användaren registrerad framgångsrikt!";
    }

    if (isset($_POST['login'])) {
        $email = $_POST['loginEmail'];
        $password = $_POST['loginPassword'];

        $userId = loginUser($conn, $email, $password);

        if ($userId) {
            $_SESSION['userId'] = $userId;

            header("Location: Welcome.php");
            exit();
            
        } else {
            echo "Inloggningen misslyckades. Var god kontrollera din e-post och ditt lösenord.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="sv">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/style.css">
    <title>Dokument</title>
</head>

<body>
    <div class="container">
        <div class="todo-app">
            <h2>Att göra lista </h2>

            <form action="" method="post">
                <h3>Registrera</h3>
                Namn: <input type="text" name="name"><br>
                E-post: <input type="text" name="email"><br>
                Lösenord: <input type="password" name="password"><br>
                <input type="submit" name="register" value="Registrera">
            </form>

            <hr>

            <form action="" method="post">
                <h3>Logga in</h3>
                E-post: <input type="text" name="loginEmail"><br>
                Lösenord: <input type="password" name="loginPassword"><br>
                <input type="submit" name="login" value="Logga in">
            </form>
        </div>
    </div>
</body>

</html>
