<?php
session_start();
$_SESSION['login_status'] = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include "connection.php";
    $adminmail = $_POST['admin_mail'];
    $adminpass = $_POST['pass'];

    // Debugging statement (remove in production)
    var_dump($_POST);

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("SELECT adminpass FROM admin_table WHERE adminmail = ?");
    $stmt->bind_param("s", $adminmail);

    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($hashed_password);
        $stmt->fetch();

      
       

        // Verify the password against the hashed password stored in the database
        if (password_verify($adminpass, $hashed_password)) {
            $_SESSION['login_status'] = true;
            $_SESSION['adminmail'] = $adminmail;
            echo "Login Success";
            header("Location: ../admin/admin_portal.html");
        } else {
            echo "<h1>Invalid </h1>";
        }
    } else {
        echo "<h1>Invalid Credentials</h1>";
    }

    $stmt->close();
    $conn->close();
}
?>


