<?php
// This file adds new users to the database
if (isset($_POST['userSignIn']) && isset($_POST['passSignIn']) && $_POST['passSignIn'] ===  $_POST['confirmSignIn'])
{
 //Import config files for the database. Change if needed
	require "config.php";

	try
	{
		$connection = new PDO($dsn, $username, $password, $options);
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
    echo 'Successfully added';

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
