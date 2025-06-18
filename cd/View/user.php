<?php 
session_start();
if(isset($_SESSION['user']))
{
require_once('../Model/alldb.php');
$res=getAll();
?>

<!DOCTYPE html>
<html>
<body>
    <table border="1">
    	<tr>
    		<th>Id</th>
    		<th>Name</th>
    		<th>Pass</th>
    	</tr>

<?php while($r=$res->fetch_assoc()){ ?>
    	<tr>
    		<td><?php echo $r["Id"]; ?></td>
    		<td><?php echo $r["Name"]; ?></td>
    		<td><?php echo $r["Pass"]; ?></td>
    	</tr>
    <?php } ?>
    </table>
</body>
</html>
<form action="../Controller/logoutController.php">
    <button type="submit" name="logout">Logout</button>
</form>
<?php } 

else
{
    header('location:homeView.php');
}?>