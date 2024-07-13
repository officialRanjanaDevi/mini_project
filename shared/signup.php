<?php

$usermail = $_POST['user_mail'];
$userpass = $_POST['pass'];

// Hash the password before storing it
$hashed_pass = password_hash($userpass, PASSWORD_BCRYPT);

include "connection.php";

// Use prepared statements to prevent SQL injection
$stmt = $conn->prepare("INSERT INTO login_table (usermail, userpass) VALUES (?, ?)");
$stmt->bind_param("ss", $usermail, $hashed_pass);

if ($stmt->execute()) {
    header("location:../client/home.php");
} else {
    echo "Signup Failed: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
