<section id="writeSection" class="panel-section">
  <div class="region-area region-area-1 bar mCustomScrollbar" data-mcs-theme="inset-2-dark">
    <?php
    include('components/writing/postListing.php');
    ?>

  </div>
  <div class="region-area region-area-2">

    <form method="post" enctype="multipart/form-data" id="form">
      <div class="form-control">

        <textarea name="write" cols="30" rows="8"></textarea>
        <button type="button" name="Send Text" id="submit"> Submit </button>

      </div>
    </form>
  </div>
</section>
