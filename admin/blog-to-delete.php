<?php
// Include necessary files and start session
include_once './config/connect.php';
session_start();

$conn = get_connection();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $blogID = $_POST['blogID'];

    $query = "DELETE FROM blogcontents WHERE blogIDNum = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $blogID);
    $success = $stmt->execute();

    if ($success) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false]);
    }
    $stmt->close();
}

$conn->close();
?>
