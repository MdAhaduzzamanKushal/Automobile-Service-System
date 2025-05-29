<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link rel="stylesheet" href="sign_in.css"> <!-- External CSS -->
</head>
<body>
    <div class="form-container">
        <h2>Sign In</h2>
        <form method="post" action="validate_sign_in.php">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            
            <button type="submit">Sign In</button>
        </form>
    </div>
</body>
</html>