<?php
require 'db_connection.php'; // Include database connection file

// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Initialize variables
$errors = [];
$full_name = $email = $phone = $company_name = $industry = $training_program = $password = "";
$services = [];
$file_upload = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    function test_input($data) {
        return htmlspecialchars(stripslashes(trim($data)));
    }

    // Validate Full Name
    if (empty($_POST["full_name"])) {
        $errors[] = "Full name is required.";
    } else {
        $full_name = test_input($_POST["full_name"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/", $full_name)) {
            $errors[] = "Only letters and white space allowed in Full Name.";
        }
    }

    // Validate Email
    if (empty($_POST["email"])) {
        $errors[] = "Email is required.";
    } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Invalid email format.";
        }
    }

    // Validate Phone
    if (!empty($_POST["phone"])) {
        $phone = test_input($_POST["phone"]);
        if (!preg_match("/^\+?[0-9\s\-]{7,20}$/", $phone)) {
            $errors[] = "Invalid phone number format.";
        }
    }

    // Validate Password
    if (empty($_POST["password"])) {
        $errors[] = "Password is required.";
    } else {
        $password = password_hash(test_input($_POST["password"]), PASSWORD_DEFAULT); // Hash password before storing
    }

    // Validate Company Name
    if (empty($_POST["company_name"])) {
        $errors[] = "Company/Organization name is required.";
    } else {
        $company_name = test_input($_POST["company_name"]);
    }

    // Validate Industry
    if (empty($_POST["industry"])) {
        $errors[] = "Industry is required.";
    } else {
        $industry = test_input($_POST["industry"]);
    }

    // Validate Services
    if (!empty($_POST["services"])) {
        $services = implode(", ", $_POST["services"]); // Convert array to comma-separated string
    }

    // Validate Training Program
    if (!empty($_POST["training_program"])) {
        $training_program = test_input($_POST["training_program"]);
    }

    // Handle File Upload
    if (!empty($_FILES["file_upload"]["name"])) {
        $target_dir = "uploads/";
        
        // Check if the uploads directory exists; if not, create it
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0755, true); // Create the directory with proper permissions
        }

        $target_file = $target_dir . basename($_FILES["file_upload"]["name"]);

        // Allow all file types
        if (move_uploaded_file($_FILES["file_upload"]["tmp_name"], $target_file)) {
            $file_upload = $target_file;
        } else {
            $errors[] = "File upload failed.";
        }
    }

    // Check for Errors
    if (!empty($errors)) {
        echo "<h3 style='color: red;'>Please fix the following errors:</h3>";
        echo "<ul style='color: red;'>";
        foreach ($errors as $error) {
            echo "<li>$error</li>";
        }
        echo "</ul>";
    } else {
        // Insert Data into the Database
        $stmt = $conn->prepare("INSERT INTO service_form (full_name, email, phone, password, company_name, industry, services, training_program, file_upload) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssssss", $full_name, $email, $phone, $password, $company_name, $industry, $services, $training_program, $file_upload);

        // Check Database Insertion
        if ($stmt->execute()) {
            // Log success and redirect
            error_log("Form submitted successfully. Redirecting to sign_in.php...");
            header("Location: sign-in.php");
            exit();
        } else {
            error_log("Database insertion failed: " . $stmt->error);
            echo "<h3 style='color: red;'>Error: " . $stmt->error . "</h3>";
        }

        $stmt->close();
    }
}
?>