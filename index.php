<?php session_start();
include('components/voting/cronjob.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Storyteller</title>
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/vendor/jquery.mCustomScrollbar.css">
</head>
<body>
	<!-- Facebook Social Login -->
	<script src="assets/js/facebookLogin.js"></script>


	<?php include('components/shared/header.php');?>

	<div id="wrap">
		<?php include('components/shared/sidenav.php');?>

		<main role="main" id="main">

			<?php include('pages/home.php') ?>
			<?php include('pages/login.php') ?>
			<?php include('pages/guide.php') ?>
			<?php include('pages/write.php') ?>

			<!-- adjust font size -->
			<div class="spinner-container">
				<button class="spinner-btn btn-plus">+</button>
				<button class="spinner-btn btn-minus">-</button>
			</div>

		</main>

	</div>
	<span id="version">Beta v_1.0</span>

	<!-- js script go before the </body> -->
	<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
	<script src="assets/js/vendor/jquery.mCustomScrollbar.concat.min.js"></script>
	<script src="assets/js/main.js"></script>
</body>
