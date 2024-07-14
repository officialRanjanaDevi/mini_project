<?php

include '../shared/connection.php';
include 'authentication.php';

$mail = $_SESSION['usermail'];
$bike_id = $_POST['name'];

// Use prepared statement for SELECT query
$stmt = $conn->prepare("SELECT * FROM cart WHERE bike_id = ? AND mail = ?");
$stmt->bind_param('is', $bike_id, $mail);
$stmt->execute();
$sql_result = $stmt->get_result();

if ($sql_result->num_rows == 0) {
    // Use prepared statement for INSERT query
    $stmt_insert = $conn->prepare('INSERT INTO cart (mail, bike_id) VALUES (?, ?)');
    $stmt_insert->bind_param('si', $mail, $bike_id);

    if ($stmt_insert->execute()) {
        header('Location:cart.php');
    } else {
        echo 'Signup Failed: ' . $stmt_insert->error;
    }

    $stmt_insert->close();
} else {
    header("Location:bike_listing.php");
}

$stmt->close();
$conn->close();
?>
