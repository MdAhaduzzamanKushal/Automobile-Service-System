<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>


    <form method="post" action="../Controller/logCheckController.php">
		Id: <input type="number" name="id"><br>
		Pass: <input type="password" name="pass"><br>
        
        <?php
        if(isset($_SESSION['error']))
        {
        	echo $_SESSION['error'];
        	unset($_SESSION['error']);
        }
        ?>
<br>

		<input type="submit" value="Login" name="login">
	</form>

	
</body>
</html>