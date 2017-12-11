<?php
 session_start();
//Count the files in the posts folder and save the number in $filecount
$directory = "posts/";
$filecount = 0;
$files = glob($directory . "*");

if ($files){
 $filecount = count($files);
}
if (isset($_SESSION['login_user'])){
//creates a new file with a new number at the end in posts and saves the data from the write input there
  if(isset($_POST['write'])) {
      $u_name =  $_SESSION['login_user'];
      $data = $_POST['write'];

      if (strlen($data) >= 1000 && strlen($data) <= 3000)
        {
          $ret = file_put_contents('posts/file'.$filecount.'.txt', $data);
          file_put_contents('byUsers/forFile'.$filecount.'.txt', $u_name);
          echo "sucess!";
        }
      else {
        if (strlen($data) < 1000){
          echo "Your post is too short, it should have at least 1000 characters, but it only has ".strlen($data).".";
          }
        else{
          echo "Your post is too long, it should have 3000 characters max, but yours has ".strlen($data).".";
          }
        }
      }
    else {
          die('no post data to process');
        }
  }
  else {
    echo 'please login';
  }

?>
