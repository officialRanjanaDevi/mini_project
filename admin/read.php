<?php
// Include the database connection file
include "../shared/connection.php";
include "authentication.php";
// Check if form data is set
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['id'])) {
        $id = intval($_POST['id']); // Convert id to integer for security
        $status = "Read";

        // Prepare the SQL statement
        $stmt = $conn->prepare("UPDATE contacts SET status = ? WHERE id = ?");
        if ($stmt === false) {
            echo "Failed to prepare the statement: " . $conn->error;
            exit();
        }
        $stmt->bind_param("si", $status, $id);

        // Execute the statement and check for success
        if ($stmt->execute()) {
            // Uncomment the following line to redirect after successful update
             header("Location: contacts.php");
            
            exit();
        } else {
            echo "Failed to update: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "ID not provided.";
    }
} else {
    echo "Invalid request method.";
}

// Close the database connection
$conn->close();
?>
