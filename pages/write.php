<section id="writeSection" class="panel-section">
<?php
$directory = "components/writing/posts/";
$filecount = 0;
$files = glob($directory . "*");
if ($files){
 $filecount = count($files);
}

if($filecount > 0){
for($i=1; $i-1 < $filecount-1; $i++){
  echo "<div>";
  echo "<p>";
  include("components/writing/posts/file".$i.".txt");
  echo "</p>";
  echo "</div>";
}
}
?>
  <p>This is the write page</p>
<form method="post" enctype="multipart/form-data" id="form">
  <textarea name="write" cols="30" rows="10"></textarea>
  <button type="button" name="Send Text" id="submit" onClick="window.location.reload()"> Submit </button>
</form>
</section>
