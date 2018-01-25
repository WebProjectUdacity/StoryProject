<div id="nav">
	<ul>
		<li class="active"><a href="#homeSection"><span id="Home" class="stm">Home<img src="assets/images/home.png" class="icom"></span></a></li>
		<li><a href="#loginSection"><span id="Log" class="stm">LogIn<img src="assets/images/login.png" class="icom"></span></a></li>
		<li><a href="#guideSection"><span id="Guide" class="stm">Guide<img src="assets/images/guide.png" class="icom"></span></a></li>
		<li><a href="#writeSection"><span id="Game" class="stm">Vote!<img src="assets/images/edit.png" class="icom"></span></a></li>
		<li><a href="write.php"><span>Write!<img src="assets/images/edit.png" class="icom"></span></a></li>
	</ul>

	<div class="font-family-container">
		<select name="fonts" id="font-selector">
			<option value="Monotype Corsiva" selected>Monotype Corsiva</option>
			<option value="Apple Chancery">Apple Chancery</option>
			<option value="Arial">Arial</option>
			<option value="Times">Times</option>
			<option value="Verdana">Verdana</option>
			<option value="Georgia">Georgia</option>
			<option value="Palatino">Palatino</option>
			<option value="Trebuchet MS">Trebuchet MS</option>
			<option value="Helvetica">Helvetica</option>
		</select>
	</div>

	<?php
	$login_value=(isset($_SESSION['login']))?$_SESSION['login']:'';;
	$login_user=(isset($_SESSION['login_user']))?$_SESSION['login_user']:'';;
	$login_social=(isset($_SESSION['fbLog']))?$_SESSION['fbLog']:'';;
	?>

	<script type="text/javascript">
	var logval=Number('<?php echo $login_value;?>');
	var loguser='<?php echo $login_user;?>';
	var fbLog =	 '<?php echo $login_social;?>';
	</script>
</div>
