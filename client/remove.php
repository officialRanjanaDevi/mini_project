<?php
include "../shared/connection.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];

    // Prepare and bind
    $stmt = $conn->prepare("DELETE FROM cart WHERE id= $id");
    

    // Execute the statement
    if ($stmt->execute()) {
         header("Location: cart.php");
    } else {
        echo "Error deleting record: " . $stmt->error;
    }

    // Close statement
    $stmt->close();

    // Redirect back to the manage brands page
    // header("Location: update_brand.php");
    exit();
}

// Close connection
$conn->close();
?>
