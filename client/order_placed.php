<?php

include '../shared/connection.php';
include 'authentication.php';

$mail = $_SESSION['usermail'];
$name = $_POST['name'];
$address = $_POST['address'];
$contact = $_POST['number'];
$city = $_POST['city'];
$bike_id = $_POST['id'];
$days = $_POST['day'];

// Use prepared statements to prevent SQL injection
$stmt = $conn->prepare('INSERT INTO `order` (mail, name, address, contact, city, days, bike_id) VALUES (?, ?, ?, ?, ?, ?, ?)');
$stmt->bind_param('sssssis', $mail, $name, $address, $contact, $city, $days, $bike_id);

if ($stmt->execute()) {
  
    header('Location:rented.php');
} else {
    echo 'Signup Failed: ' . $stmt->error;
}

$stmt->close();
$conn->close();
?>
