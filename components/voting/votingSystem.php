<?php
session_start();
if ($_SESSION['login']===1 && isset($_POST['vote'])){
  $user = $_SESSION['login_user'];
  $i = $_POST['vote'];
  $id =  $_POST['index'];

//Will change the string into a number
  switch($i){
    case "one":
      $voteVal =  1;
      break;
    case "two":
      $voteVal =  2;
      break;
    case "three":
      $voteVal =  3;
      break;
    case "four":
      $voteVal =  4;
      break;
    case "five":
      $voteVal =  5;
      break;
    default:
      $voteVal =  0;
      break;
  }

// Main Code for Saving user voting data
  //Saves user data on what he voted
  if (file_exists("votesUserData/".$user.".txt")){
    $voteData = unserialize(file_get_contents("votesUserData/".$user.".txt"));

    if (isset($voteData[$id])){
      $oldData = $voteData[$id];
    }
    $voteData[$id] = $voteVal;
    $newData = serialize($voteData);
    file_put_contents("votesUserData/".$user.".txt", $newData);
  }
  else{
    $voteData[$id] = $voteVal;
    $newData = serialize($voteData);
    file_put_contents("votesUserData/".$user.".txt", $newData);
  }

//Sets the votes (sum)
if(file_exists("votes/files".$id.".txt")){
  $allVotes = file_get_contents("votes/files".$id.".txt");
  if(isset($oldData)){
    $allVotes -= $oldData;
  }
  $allVotes += $voteVal;
  file_put_contents("votes/files".$id.".txt", $allVotes);
}
else {
  file_put_contents("votes/files".$id.".txt", $voteVal);
}

}
else {
  echo 'Please login';
}
 ?>
