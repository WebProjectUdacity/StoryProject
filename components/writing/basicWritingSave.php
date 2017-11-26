<?php
//Count the files in the posts folder and save the number in $filecount
$directory = "posts/";
$filecount = 0;
$files = glob($directory . "*");
if ($files){
 $filecount = count($files);
}
echo "There were $filecount files";

//creates a new file with a new number at the end in posts and saves the data from the write input there
if(isset($_POST['write'])) {
    $data = $_POST['write'];
    $ret = file_put_contents('posts/file'.$filecount.'.txt', $data);
    if($ret === false) {
        die('There was an error writing this file');
    }
    else {
        echo "$ret bytes written to file";
    }
}
else {
   die('no post data to process');
}

?>
