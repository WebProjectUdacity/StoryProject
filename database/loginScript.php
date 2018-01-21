<?php
   include("config.php");
   session_start();

   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form
      $db = mysqli_connect($host,$username,$password,$dbname);
      $myusername = mysqli_real_escape_string($db,$_POST['userLogin']);
      $mypassword = mysqli_real_escape_string($db,$_POST['userPass']);

      $sql = "SELECT id FROM users WHERE BINARY username = '$myusername' and BINARY password = '$mypassword'";
      $result = mysqli_query($db,$sql);
      if (!$result) {
        printf("Error: %s\n", mysqli_error($db));
      exit();
      }
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

      $count = mysqli_num_rows($result);

      // If result matched $myusername and $mypassword, table row must be 1 row

      if($count == 1) {
         $_SESSION['login_user'] = $myusername;
         $_SESSION['login'] = 1;
      }else {
         echo "Your Login Name or Password is invalid";
      }
   }
?>
