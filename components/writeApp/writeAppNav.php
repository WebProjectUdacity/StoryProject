<div id="nav">
	<ul>
		<li><a href="index.php"><span id="Home" class="stm"><img src="assets/images/back_arr.svg" class="app_nav_icons"></span></a></li>
	</ul>


	<div class="font-family-container">
		<select name="fonts" id="font-selector" style>
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
	<span class="font_family_container_icon"><img src="assets/images/font_select.svg" class="app_nav_icons font-ico"></span>

	<div class="spinner-container">
		<button class="spinner-btn btn-plus">+</button>
		<button class="spinner-btn btn-minus">-</button>
	</div>

	<?php
	$login_value=(isset($_SESSION['login']))?$_SESSION['login']:'';;
	$login_user=(isset($_SESSION['login_user']))?$_SESSION['login_user']:'';;
	?>

	<script type="text/javascript">
	var logval=Number('<?php echo $login_value;?>');
	var loguser='<?php echo $login_user;?>';
	</script>
</div>
