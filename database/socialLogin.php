<?php
 session_start();
// This file adds new users to the database
if (isset($_POST['username']))
{
 //Import config files for the database. Change if needed
	require "config.php";

	try
	{
		$connection = new PDO($dsn, $username, $password, $options);
		$nametest =	$_POST['username'];
		$mailtest =	$_POST['usermail'];

		$sqlu = "SELECT id FROM users WHERE username = '$nametest'";
		$sqlm = "SELECT id FROM users WHERE email = '$mailtest'";

		//Looks for the username in the database.
		$resultu= $connection->prepare($sqlu);
		$resultu->execute();
		$countu = $resultu->rowCount();

		//Looks for the mail in the database.
		$resultm= $connection->prepare($sqlm);
		$resultm->execute();
		$countm = $resultm->rowCount();

	  if( $countu > 0 && $countm > 0){
			$_SESSION['login_user'] = $_POST['username'];
			$_SESSION['login'] = 1;
			$_SESSION['fbLog'] = 1;
			echo "logged in";
		}

		else {
    	//Define array from send data
			$new_user = array(
				"username" => $_POST['username'],
				"email"     => $_POST['usermail'],
			);
    	//var to add all data into the right rows
			$sql = sprintf(
					"INSERT INTO %s (%s) values (%s)",
					"users",
					implode(", ", array_keys($new_user)),
					":" . implode(", :", array_keys($new_user))
			);
    	//execute the write to the database process
    	$statement = $connection->prepare($sql);
    	$statement->execute($new_user);
			$_SESSION['login_user'] = $_POST['username'];
			$_SESSION['login'] = 1;
			$_SESSION['fbLog'] = 1;
			echo "new user created";
	 }

	}
  //Error message in case of errors
	catch(PDOException $error)
	{
		echo $sql . "<br>" . $error->getMessage();
	}

}
else{
  echo "Please enter all information correctly";
}
?>
