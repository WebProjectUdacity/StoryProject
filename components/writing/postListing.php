<?php
//Checks for Session vars to avoid errors
if (isset($_SESSION['login_user'])){
 $user = $_SESSION['login_user'];
 $Verif = $_SESSION['login'];
}
else {
  $Verif = 0;
}

$directory = "components/writing/posts/";
$filecount = 0;
$files = glob($directory . "*");
if ($files){
$filecount = count($files);
}

//Checks if userVoteData file exists for logged in user
if (file_exists("components/voting/votesUserData/".$user.".txt")){
  if ($Verif === 1){
    $userVoteData = unserialize(file_get_contents("components/voting/votesUserData/".$user.".txt"));
  }
}


if($filecount > 0){
for($i=1; $i < $filecount; $i++){
  //Sets vars of the links (default)
  $starOne = 'assets/images/star.png';
  $starTwo = 'assets/images/star.png';
  $starThree = 'assets/images/star.png';
  $starFour = 'assets/images/star.png';
  $starFive = 'assets/images/star.png';

  //Sets stars based on userVotingData
  if(isset($userVoteData[$i])){
    switch($userVoteData[$i]){
      case 1:
        $starOne = 'assets/images/star_voted.png';
      case 2:
        $starTwo = 'assets/images/star_voted.png';
      case 3:
        $starThree = 'assets/images/star_voted.png';
      case 4:
        $starFour = 'assets/images/star_voted.png';
      case 5:
        $starFive = 'assets/images/star_voted.png';
      default:
        break;
  }
}
  //Includes all the Posts
  echo "<div>";
  echo "<p>";
  include("components/writing/posts/file".$i.".txt");
  echo "</p>";
  echo "<div class='stars' id='$i'>";
  echo "<img src='$starFive' class='one'>";
  echo "<img src='$starFour' class='two'>";
  echo "<img src='$starThree' class='three'>";
  echo "<img src='$starTwo' class='four'>";
  echo "<img src='$starOne' class='five'>";
  echo "</div>";
  echo "</div>";
}
}
?>
