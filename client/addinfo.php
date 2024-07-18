<?php

include "../shared/connection.php";
include "authentication.php";



$mail = $_POST['mail'];
$name = $_POST['name'];
$address1 = $_POST['address1'];
$address2 = $_POST['address2'];
$contact1 = $_POST['number1'];
$contact2 = $_POST['number2'];
$city = $_POST['city'];
$state = $_POST['state'];
$zip = $_POST['zip'];

// Use prepared statements to prevent SQL injection
$stmt = $conn->prepare("INSERT INTO registered_user (mail, name, address1, address2, contact1, contact2, city, state, zip) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssssss", $mail, $name, $address1, $address2, $contact1, $contact2, $city, $state, $zip);

if ($stmt->execute()) {
    
 header("location:bike_listing.php");
} else {
    echo "Signup Failed: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
