<section id="writeSection" class="panel-section">
  <div class="region-area region-area-1 bar mCustomScrollbar" data-mcs-theme="inset-2-dark">
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
  
  </div>
  <div class="region-area region-area-2">

    <form method="post" enctype="multipart/form-data" id="form">
      <div class="form-control">

        <textarea name="write" cols="30" rows="8"></textarea>
        <button type="button" name="Send Text" id="submit" onClick="window.location.reload()"> Submit </button>

      </div>
    </form>
  </div>
</section>
