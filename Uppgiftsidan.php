<?php
include "connect.php";

function addTask($conn, $task)
{
    $stmt = $conn->prepare("INSERT INTO todo (attgora) VALUES (?)");
    $stmt->execute([$task]);
    echo "Du har nu lagt till en ny uppgift att göra!";
}

function completeTask($conn, $id)
{
    $stmt = $conn->prepare("UPDATE todo SET klar = 1 WHERE ID = ?");
    $stmt->execute([$id]);
    echo "Uppgiften är nu markerad som klar!";
}

function updateTask($conn, $id, $newTask)
{
    $stmt = $conn->prepare("UPDATE todo SET attgora = ? WHERE ID = ?");
    $stmt->execute([$newTask, $id]);
    echo "Uppgiften är nu uppdaterad!";
}

function deleteTask($conn, $id)
{
    $stmt = $conn->prepare("DELETE FROM todo WHERE ID = ?");
    $stmt->execute([$id]);
    echo "Uppgiften är nu borttagen!";
}

function getTasks($conn)
{
    $stmt = $conn->query("SELECT * FROM todo");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['addTask'])) {
        $newTask = $_POST['newTask'];
        addTask($conn, $newTask);
    }

    if (isset($_POST['showAllTasks'])) {
        $tasks = getTasks($conn);
        foreach ($tasks as $task) {
            echo "ID: " . $task['ID'] . " - Uppgift: " . $task['attgora'] . " - Klar: " . ($task['klar'] ? 'Ja' : 'Nej') . " - Datum: " . $task['datum'] . "
            <form method='post'>
                <input type='hidden' name='taskId' value='" . $task['ID'] . "'>
                <button type='submit' name='completeTask'>Mark as Done</button>
                <input type='text' name='updatedTask' placeholder='New Task'>
                <button type='submit' name='updateTask'>Update</button>
                <button type='submit' name='deleteTask'>Delete</button>
            </form><br>";
        }
    }

    if (isset($_POST['completeTask'])) {
        $taskId = $_POST['taskId'];
        completeTask($conn, $taskId);
    }

    if (isset($_POST['updateTask'])) {
        $taskId = $_POST['taskId'];
        $updatedTask = $_POST['updatedTask'];
        updateTask($conn, $taskId, $updatedTask);
    }

    if (isset($_POST['deleteTask'])) {
        $taskId = $_POST['taskId'];
        deleteTask($conn, $taskId);
    }
}
$conn = null;
?>
