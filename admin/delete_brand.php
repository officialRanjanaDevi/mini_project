<?php
  include "../shared/connection.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];

    // Prepare and bind
    $stmt = $conn->prepare("DELETE FROM brand WHERE name= ?");
    $stmt->bind_param("i", $name);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    // Close statement
    $stmt->close();
}

// Close connection
$conn->close();

// Redirect back to the manage brands page
header("Location: update_brand.php");
exit();
?>
