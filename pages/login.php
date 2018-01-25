<section id="loginSection" class="panel-section">

	<form method="post" action="" id="login-signup">

		<fieldset class="form-container">

			<div class="form-row choice-row">
				<input type="radio" name="form" id="loginBtn" value="LogIn" checked>
				<label for="loginBtn" class="logsign">Log In</label>
				<input type="radio" name="form" id="signupBtn" value="SignUp">
				<label for="signupBtn" class="logsign">Sign Up</label>
			</div>

			<div class="form-row login-row active">
			</div>

			<div class="form-row signIn-row hidden-row">

			</div>
			<div scope="public_profile,email"
		  onlogin="checkLoginState();"
			class="fb-login-button"
			data-max-rows="1"
			data-size="medium"
			data-button-type="login_with"
			data-show-faces="false"
			data-auto-logout-link="false"
			data-use-continue-as="false">
		</div>
		</fieldset>

	</form>


</section>
