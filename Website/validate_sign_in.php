<?php
require 'db_connection.php'; // Include database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Check email and password in the database
    $stmt = $conn->prepare("SELECT password FROM service_form WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($hashed_password);
        $stmt->fetch();

        if (password_verify($password, $hashed_password)) {
            header("Location: welcome.php"); // Redirect to welcome page
            exit();
        } else {
            echo "Invalid password. Please try again.";
        }
    } else {
        echo "No user found with this email. Please try again.";
    }

    $stmt->close();
    $conn->close();
}
?>