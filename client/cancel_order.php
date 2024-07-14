<?php

// Include the database connection file
include "../shared/connection.php";

// Check if form data is set
if (isset($_POST['id'])) {
    $id = $_POST['id'];

    // Prepare the SQL statement
    $stmt = $conn->prepare("UPDATE `order` SET status = ? WHERE id = ?");
    if ($stmt === false) {
        die('Prepare failed: ' . htmlspecialchars($conn->error));
    }

    // Bind the parameters
    $status = "Cancel Requested";
    $stmt->bind_param("si", $status, $id);

    // Execute the statement and check for success
    if ($stmt->execute()) {
        header("Location: rented.php");
        exit();
    } else {
        echo "Failed: " . htmlspecialchars($stmt->error);
    }

    // Close the statement
    $stmt->close();
} else {
    echo "Form data not set.";
}

// Close the connection
$conn->close();
?>
