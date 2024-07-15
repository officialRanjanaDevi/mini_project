<?php
include "../shared/connection.php";
include "authentication.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];

    // Prepare and bind
    $stmt = $conn->prepare("DELETE FROM brand WHERE name = ?");
    $stmt->bind_param("s", $name);  // "s" denotes the type string

    // Execute the statement
    if ($stmt->execute()) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $stmt->error;
    }

    // Close statement
    $stmt->close();

    // Redirect back to the manage brands page
    header("Location: update_brand.php");
    exit();
}

// Close connection
$conn->close();
?>
