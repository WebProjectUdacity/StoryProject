/*

	Creating a global name space
	for protecting our code from
	Js codes.

	the name space is stApp using
	an IIFE.

	it is an object
	in which you the initToggleMenu and the init
	function live and there protected from the
	outside code

*/

window.stApp = {};

(function(window, document, $, stApp, undefined) {
	"use strict";

	window.stApp = window.stApp || {};

	// creating a function
	// which will start
	// the app working
	stApp.init = function() {

		// this is function that makes the
		// menu work
		this.initToggleMenu = function() {

			var $wrapper = $('#nav');
			var $panelSection = $('.panel-section');

			$wrapper.on('click', '.stm', function(e){
				e.preventDefault();
				var $id = $(this).attr('id')
				//console.log($(this).attr('id'));

				switch ($id) {
					case 'Log':
						$panelSection.removeClass('active');
						$('#loginSection').addClass('active');
						break;
					case 'Guide':
						$panelSection.removeClass('active');
						$('#guideSection').addClass('active');
						break;
					case 'Game':
						$panelSection.removeClass('active');
						$('#writeSection').addClass('active');
						break;
					case 'Out':
						logout();
						break;
					default:
						$panelSection.removeClass('active');
						$('#homeSection').addClass('active');
				}

				var $li = $(this).closest('li');
				$li.addClass('active');
				$li.siblings().removeClass('active');

			});

		};


		//This is a function that makes
		//login/sign in toggle
		this.initToggleLogin = function() {
			var $loginPanel = $('.login-row');
			var $signInPanel = $('.signIn-row');
			var $choice = $('.choice-row');
			var _radio = $choice.find('input[type=radio]');

			var initFnToggle = function() {
				var _checked = $choice.find("input[type=radio]:checked");
				var _val = _checked.val();

				switch(_val) {
					case 'LogIn':
						$signInPanel.removeClass('active').addClass('hidden-row').empty();
						$loginPanel.removeClass('hidden-row').addClass('active');
						$loginPanel.append(`
						<label for="userLogin">Username:</label><input type="text" name="userLogin" required>
						<label for="userPass">Password:</label><input type="password" name="userPass" placeholder="******" required>
						<input type="submit" value="LogIn" id="login">`);
						break;
					case 'SignUp':
						$loginPanel.removeClass('active').addClass('hidden-row').empty();
						$signInPanel.removeClass('hidden-row').addClass('active');
						$signInPanel.append(`
						<label for="userSignIn">Username:</label><input type="text" name="userSignIn" required>
						<label for="emailSignIn">Email adress:</label><input type="email" placeholder="your@domain.com" name="emailSignIn" required>
						<label for="passSignIn">Password:</label><input type="password" placeholder="******" name="passSignIn" required>
						<label for="confirmSignIn">Password:</label><input type="password" placeholder="******" name="confirmSignIn" required>
						<input type="submit" value="SignUp" id="signup">
						`);

				}

			};

			initFnToggle();

			_radio.on('change', initFnToggle)

		};


		/* Following function sets the scrollbar theme. */
		this.initMalihu = function() {
			$(window).on("load",function(){
					$("#writeSection .region-area-1").mCustomScrollbar({
						theme: "inset-2-dark", // For more themes, see: http://manos.malihu.gr/repository/custom-scrollbar/demo/examples/scrollbar_themes_demo.html
						scrollButtons:{
							enable: true
						}
					});
			});
		};

		/* 
			This is a function for increasing or decreasing the 
		  font size of the website 
		*/
		this.initAdjustFont = function() {
			
			var $obj = $('.spinner-container');
			var $btnPlus = $obj.find('.btn-plus');
			var $btnMinus = $obj.find('.btn-minus');
			var $rootEl = $('html');
			var initVal = 100

			$btnPlus.on('click', function(e){				
				e.stopPropagation();
				if(initVal < 116 ) {
					initVal++;
					$rootEl.css({ fontSize : initVal + '%' });
				}
				//..
			});

			$btnMinus.on('click', function(e){
				e.stopPropagation();
				if(initVal > 84) {
					initVal--;
					$rootEl.css({ fontSize : initVal + '%' });				
				}
				//..
			});			

		};	
		

		/*Sends data from write to the basicsWritingSave.php*/
			$("#submit").click(function(){
				$.ajax({
					type: 'POST',
					url: 'components/writing/basicWritingSave.php',
					data: $('#form').serialize(),
						success: function (data) {
						},
				});
			});


		/*Sends the signup data to the createUser.php to add them
		to the database.
		*/

			$("#login-signup").on("click", "#signup", function(){
				$.ajax({
					type: 'POST',
					url: 'database/createUser.php',
					data: $('#login-signup').serialize(),
					success: function (data) {
						aler(data);
					},
					error: function(jqXHR, textStatus) {
						alert( "Request failed: " + textStatus );
					},
				});
			});

			
		/*Sends login data to the login script
		*/
if (!(logval = 0)){
			$("#login-signup").on("click", "#login", function(){
				$.ajax({
					type: 'POST',
					url: 'database/loginScript.php',
					data: $('#login-signup').serialize(),
					success: function (data) {
					},
					error: function(jqXHR, textStatus) {
						alert( "Request failed: " + textStatus );
					},
				});
			});

       };

	};


  //logged in JS changes
	var logselect = $('#Log');
	if (logval > 0){
		logselect.text('LogOut');
		logselect.attr('id', 'Out');
		$('#version').text("Beta v_1.0 " + loguser);
	}

	//Logout function
	function logout(){
		logselect.text('LogIn');
		logselect.attr('id', 'Log');
		$.ajax({
			type: 'POST',
			url: 'database/logOut.php',
			success: function (data){

			},
		})
		$('#version').text('Beta v_1.0')
		logval = 0;
	}

	// when the document is ready
	// start the init function
	// all of our code
	$(function() {

		stApp.init();
		stApp.initToggleMenu();
		stApp.initToggleLogin();
		stApp.initMalihu();
		stApp.initAdjustFont();

	});


})(window, document, jQuery, window.stApp)
