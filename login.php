<?php 
include("includesFinal/header.php");

?>

<form class="form-inline">
  <div class="form-group">
    <label class="sr-only" for="exampleInputEmail3">Usersname</label>
    <input type="user" class="form-control" id="userinput" placeholder="User">
  </div>
  <div class="form-group">
    <label class="sr-only" for="exampleInputPassword3">Password</label>
    <input type="password" class="form-control" id="passwordinput" placeholder="Password">
  </div>
  <div class="checkbox">
    <label>
      <input type="checkbox">Remember me
    </label>
  </div>
  <button type="submit" class="btn btn-primary">Sign in</button>
</form>

<?php 
if (isset($_POST['submit']))
{
	$usersname=trim($_POST['userinput']);
	$password=trim($_POST['passwordinput']);

	$query = "SELECT Username, Password FROM Users = ?";

	$login = $db->query($query);

	$stmt->bind_result('ss', $bindUsername[30], $bindPassword[30]);

	$stmt->execute();

	$stmt->store_results();

  // Login works but doesn't affect anything else afterwards. Index doesn't recognize the login 01/31/18
	if ($usersname == $bindUsername && $password == $bindPassword)
	{
    	echo "<h2>You have successfully logged in!\n</h2>";
	}	
   		else 
		echo "<h2>Incorrect Username or Password has been entered!\n</h2>";
		//If the user doesn't enter in the correct user and password this is outputted.                      
}




 ?>

<?php include("includesFinal/footer.php");?>  