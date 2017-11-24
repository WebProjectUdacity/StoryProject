<section id="writeSection" class="panel-section">
<?php
$directory = "componets/writing/posts/";
$filecount = 0;
$files = glob($directory . "*");
if ($files){
 $filecount = count($files);
}

if($filecount > 0){
for($i=1; $i-1 <= $filecount; $i++){
  echo "<div>";
  echo "<p>";
  include("components/writing/posts/file".$i.".txt");
  echo "</p>";
  echo "</div>";}
}
?>
  <p>This is the write page</p>
<form action="components/writing/basicWritingSave.php" method="post">
  <textarea name="write" cols="30" rows="10"></textarea>
  <input type="submit" name="submit" value="Send Text">
</form>
</section>
