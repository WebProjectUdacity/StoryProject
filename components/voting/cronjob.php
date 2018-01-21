<?php
$last_run = file_get_contents('components/voting/lastrun.md');
if(strtotime($last_run) < (time()-48*3600)){

  $directory = "components/voting/votes/";
  $filecount = 0;
  $files = glob($directory . "*");
  if ($files){
  $filecount = count($files);
  }
  if($filecount > 1){

    $allFiles = preg_grep('~\.(txt)$~', scandir($directory));
    foreach ($allFiles as $file){
        $keys[] =  filter_var($file, FILTER_SANITIZE_NUMBER_INT);
    }

    for($i=0; $i < $filecount-1; $i++){
      $votesArr[$keys[$i]] =  file_get_contents("components/voting/votes/files".$keys[$i].".txt");
    }
    $highest = max($votesArr);
    $id = array_search($highest, $votesArr);
    $winner = file_get_contents('components/writing/posts/file'.$id.'.txt');
    file_put_contents('ourStory.md', $winner."\n\n", FILE_APPEND);
    $filesdel =  glob('{components/voting/votes/*.txt,components/voting/votesUserData/*.txt,components/writing/posts/*.txt,components/writing/byUsers/*.txt}', GLOB_BRACE);
    foreach($filesdel as $files){
      unlink($files);
    }
  }
  file_put_contents('components/voting/lastrun.md', date('y-m-d'));
}
 ?>
