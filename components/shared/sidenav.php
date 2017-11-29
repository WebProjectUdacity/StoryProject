<div id="nav">
	<ul>
		<li class="active"><a href="#homeSection"><span id="Home" class="stm">Home<img src="assets/images/home.png" class="icom"></span></a></li>
		<li><a href="#loginSection"><span id="Log" class="stm">LogIn<img src="assets/images/login.png" class="icom"></span></a></li>
		<li><a href="#guideSection"><span id="Guide" class="stm">Guide<img src="assets/images/guide.png" class="icom"></span></a></li>
		<li><a href="#writeSection"><span id="Game" class="stm">Write!<img src="assets/images/edit.png" class="icom"></span></a></li>
	</ul>
	<?php
	$login_value=(isset($_SESSION['login']))?$_SESSION['login']:'';;
	$login_user=(isset($_SESSION['login_user']))?$_SESSION['login_user']:'';;
	?>
	<script type="text/javascript">
	var logval='<?php echo $login_value;?>';
	var loguser='<?php echo $login_user;?>';
	</script>
</div>
