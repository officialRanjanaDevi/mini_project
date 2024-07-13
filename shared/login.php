<?php
session_start();
$_SESSION['login_status'] = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include "connection.php";
    $usermail = $_POST['user_mail'];
    $userpass = $_POST['pass'];

    // Debugging statement (remove in production)
    var_dump($_POST);

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("SELECT userpass FROM login_table WHERE usermail = ?");
    $stmt->bind_param("s", $usermail);

    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($hashed_password);
        $stmt->fetch();

      
       

        // Verify the password against the hashed password stored in the database
        if (password_verify($userpass, $hashed_password)) {
            $_SESSION['login_status'] = true;
            $_SESSION['usermail'] = $usermail;

            echo "Login Success ";
        
            header("location:../client/home.php");
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


