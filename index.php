<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Storyteller</title>
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/jquery.mCustomScrollbar.css">
</head>
<body>
	<?php include('components/shared/header.php');?>

	<div id="wrap">
		<?php include('components/shared/sidenav.php');?>

		<main role="main" id="main" class="bar mCustomScrollbar" data-mcs-theme="inset-2-dark">

			<?php include('pages/home.php') ?>
			<?php include('pages/login.php') ?>
			<?php include('pages/guide.php') ?>
			<?php include('pages/write.php') ?>

		</main>

	</div>
	<span id="version">Beta v_1.0</span>

	<!-- js script go before the </body> -->
	<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
	<script src="assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
	<script src="assets/js/main.js"></script>
	<script src="assets/js/ajaxSendWrite.js"></script>
</body>
