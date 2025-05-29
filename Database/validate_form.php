<?php
require 'db_connection.php'; // Include database connection file

$errors = [];
$full_name = $email = $phone = $company_name = $industry = $training_program = $password = "";
$services = [];
$file_upload = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    function test_input($data) {
        return htmlspecialchars(stripslashes(trim($data)));
    }

    // Full Name
    if (empty($_POST["full_name"])) {
        $errors[] = "Full name is required.";
    } else {
        $full_name = test_input($_POST["full_name"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/", $full_name)) {
            $errors[] = "Only letters and white space allowed in Full Name.";
        }
    }

    // Email
    if (empty($_POST["email"])) {
        $errors[] = "Email is required.";
    } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Invalid email format.";
        }
    }

    // Phone
    if (!empty($_POST["phone"])) {
        $phone = test_input($_POST["phone"]);
        if (!preg_match("/^\+?[0-9\s\-]{7,20}$/", $phone)) {
            $errors[] = "Invalid phone number format.";
        }
    }

    // Password
    if (empty($_POST["password"])) {
        $errors[] = "Password is required.";
    } else {
        $password = password_hash(test_input($_POST["password"]), PASSWORD_DEFAULT); // Hash password before storing
    }

    // Company Name
    if (empty($_POST["company_name"])) {
        $errors[] = "Company/Organization name is required.";
    } else {
        $company_name = test_input($_POST["company_name"]);
    }

    // Industry
    if (empty($_POST["industry"])) {
        $errors[] = "Industry is required.";
    } else {
        $industry = test_input($_POST["industry"]);
    }

    // Services
    if (!empty($_POST["services"])) {
        $services = implode(", ", $_POST["services"]); // Convert array to comma-separated string
    }

    // Training Program
    if (!empty($_POST["training_program"])) {
        $training_program = test_input($_POST["training_program"]);
    }

    // File Upload
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

    // Show all errors if they exist
    if (!empty($errors)) {
        echo "<h3 style='color: red;'>Please fix the following errors:</h3>";
        echo "<ul style='color: red;'>";
        foreach ($errors as $error) {
            echo "<li>$error</li>";
        }
        echo "</ul>";
    } else {
        // Insert data into the database
        $stmt = $conn->prepare("INSERT INTO service_form (full_name, email, phone, password, company_name, industry, services, training_program, file_upload) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssssss", $full_name, $email, $phone, $password, $company_name, $industry, $services, $training_program, $file_upload);

        if ($stmt->execute()) {
            echo "<h2>Form submitted successfully!</h2>";
        } else {
            echo "<h3 style='color: red;'>Error: " . $stmt->error . "</h3>";
        }

        $stmt->close();
    }
}
?>