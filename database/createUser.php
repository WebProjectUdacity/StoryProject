<?php
// This file adds new users to the database
if (isset($_POST['userSignIn']) && isset($_POST['passSignIn']) && $_POST['passSignIn'] ===  $_POST['confirmSignIn'])
{
 //Import config files for the database. Change if needed
	require "config.php";

	try
	{
		$connection = new PDO($dsn, $username, $password, $options);
		$nametest =	$_POST['userSignIn'];
		$mailtest =	$_POST['emailSignIn'];

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

		if ($countu > 0){
			echo 'This Username already exists';
		}
		elseif($countm > 0){
			echo 'This E-Mail already exists';
		}
		else {
    	//Define array from send data
			$new_user = array(
				"username" => $_POST['userSignIn'],
				"password"  => $_POST['passSignIn'],
				"email"     => $_POST['emailSignIn'],
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
