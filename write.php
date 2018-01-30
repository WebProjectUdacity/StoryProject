<?php session_start();
include('components/voting/cronjob.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Storyteller</title>
	<link rel="stylesheet" href="assets/css/writeApp.css">
	<link rel="stylesheet" href="assets/css/vendor/jquery.mCustomScrollbar.css">
</head>
<body>
	<!-- Facebook Social Login -->
	<script src="assets/js/facebookLogin.js"></script>

	<div id="wrap">
		<?php include('components/writeApp/writeAppNav.php');?>

		<main role="main" id="main" class="menue">

			<section id="writeSection" class="panel-section">
			  <div class="region-area region-area-1 bar mCustomScrollbar" data-mcs-theme="inset-2-dark">
					<p>
					<?php
			    include('components/voting/ourStory.md');
			    ?>
				</p>

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


		</main>

	<div id="vote" class="menue">
		<div class=" barvote mCustomScrollbar" data-mcs-theme="inset-2-dark">
			<?php
			include('components/writing/postListing.php');
			?>

		</div>
	</div>


	<div id="char" class="menue">
		<div class=" barvote mCustomScrollbar" data-mcs-theme="inset-2-dark">
			<?php
			include('components/writing/postListing.php');
			?>

		</div>
	</div>
	</div>

	<!-- js script go before the </body> -->
	<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
	<script src="assets/js/vendor/jquery.mCustomScrollbar.concat.min.js"></script>
	<script src="assets/js/writeApp.js"></script>
</body>
