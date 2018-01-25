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
				var $id = $(this).attr('id')
				//console.log($(this).attr('id'));

				switch ($id) {
					default:
						$panelSection.removeClass('active');
						$('#homeSection').addClass('active');
						$('.spinner-container, .font-family-container').removeClass('active');
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
						$loginPanel.append(' \
						<label for="userLogin">Username:</label><input type="text" name="userLogin" required> \
						<label for="userPass">Password:</label><input type="password" name="userPass" placeholder="******" required> \
						<button type="button" value="LogIn" id="login">LogIn</button>');
						break;
					case 'SignUp':
						$loginPanel.removeClass('active').addClass('hidden-row').empty();
						$signInPanel.removeClass('hidden-row').addClass('active');
						$signInPanel.append(' \
						<label for="userSignIn">Username:</label><input type="text" name="userSignIn" required> \
						<label for="emailSignIn">Email adress:</label><input type="email" placeholder="your@domain.com" name="emailSignIn" required> \
						<label for="passSignIn">Password:</label><input type="password" placeholder="******" name="passSignIn" required> \
						<label for="confirmSignIn">Password:</label><input type="password" placeholder="******" name="confirmSignIn" required> \
						<button type="button" id="signup">SignUp</button> \
						');

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
			var initVal =  parseInt($("#writeSection p").css('font-size'),10);
			var initValVote =  parseInt($("#vote p").css('font-size'),10);

			($('#writeSection').is('.active'))? $obj.addClass('active') : $obj.removeClass('.active');


			$btnPlus.on('click', function(e){
				e.stopPropagation();
				if(initVal <= 50 ) {
					initVal++;
					$('#writeSection p').css({ fontSize : initVal + 'px' });
					$('#vote p').css({ fontSize : initVal + 'px' });
				}
				//..
			});

			$btnMinus.on('click', function(e){
				e.stopPropagation();
				if(initVal > 17) {
					initVal--;
					$('#writeSection p').css({ fontSize : initVal + 'px' });
				}
				//..
			});

		};


		this.initFontSelection = function() {
			var $obj = $('#font-selector');
			var _val;

			$obj.on('change', function(){
				console.log($(this).find('option:selected').val())
				_val = $(this).find('option:selected').val() ;
				document.documentElement.style.setProperty('--baseFontFamily', _val);
			});




		};

		//Design code for writing Appl
		$('.font-family-container').mouseover(function(){
			$('.font-ico').fadeTo(200, 1.0);
		});

		$('.font-family-container').mouseleave(function(){
			$('.font-ico').fadeTo(200, 0.8);
		});

		/*Sends data from write to the basicsWritingSave.php*/
			$("#submit").click(function(){
				$.ajax({
					type: 'POST',
					url: 'components/writing/basicWritingSave.php',
					data: $('#form').serialize(),
						success: function (data) {
							if (data === "sucess!"){
                 	window.location.reload();
							}
							else {
								$(".error-msg2").remove();
								$("#form").append("<p class='error-msg2'>"+data+"</p>");
							}
						},
				});
			});


		/*Sends the signup data to the createUser.php to add them
		to the database.
		*/

			$("#login-signup").on("click", "#signup", function(e){
				$.ajax({
					type: 'POST',
					url: 'database/createUser.php',
					data: $('#login-signup').serialize(),
					success: function (data) {
						var msg = "";
						if (data === 'This Username already exists'){
							msg = "This Username already exists";
						}
						else if (data === 'This E-Mail already exists'){
							msg = "This E-Mail already exists";
						}
						else{
							window.location.reload();
						}
						e.stopImmediatePropagation();
						$(".error-msg").remove();
						$(".form-container").append("<p class='error-msg'>"+msg+"</p>");
					},
					error: function(jqXHR, textStatus) {
						alert( "Request failed: " + textStatus );
					},
				});
			});


		/*Sends login data to the login script
		*/
if (!(logval == 0)){
			$("#login-signup").on("click", "#login", function(e){
				$.ajax({
					type: 'POST',
					url: 'database/loginScript.php',
					data: $('#login-signup').serialize(),
					success: function (data) {
						var msg = "";
						if (data === "Your Login Name or Password is invalid"){
							msg = "Your Login Name or Password is invalid";
						}
						else{
							window.location.reload();
						}
						e.stopImmediatePropagation();
						$(".error-msg").remove();
						$(".form-container").append("<p class='error-msg'>"+msg+"</p>");
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
	var loginval = 1;
	if (logval > 0 && loginval > 0){
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
		loginval = 0;
	}

	//New JS for Voting function
	$('img').click(function(){
		var val = $(this).attr('class').split(' ')[0];
		var id = $(this).parent().attr('id');
		var select = $(this).parent();
		var newSt = 'assets/images/star_voted.png';
		var oldSt = 'assets/images/star.png';
		$.ajax({
			url: 'components/voting/votingSystem.php',
			type: 'POST' ,
			data: {vote: val,
						 index: id},
			success: function(data){
				if (data === 'Please login'){
				alert(data);
			}
				else {
					switch(val){
						case 'one':
							select.find('.one').attr('src', newSt);
							select.find('.two, .three, .four, .five').attr('src', oldSt);
							break;
						case 'two':
							select.find('.one, .two').attr('src', newSt);
							select.find('.three, .four, .five').attr('src', oldSt);
							break;
						case 'three':
							select.find('.one, .two, .three').attr('src', newSt);
							select.find('.four, .five').attr('src', oldSt);
							break;
						case 'four':
							select.find('.one, .two, .three, .four').attr('src', newSt);
							select.find('.five').attr('src', oldSt);
							break;
						case 'five':
							select.find('.one, .two, .three, .four, .five').attr('src', newSt);
							break;
						default:
							break;
					}
				}
			}
		})

	})


	// when the document is ready
	// start the init function
	// all of our code
	$(function() {

		stApp.init();
		stApp.initToggleMenu();
		stApp.initToggleLogin();
		stApp.initMalihu();
		stApp.initAdjustFont();
		stApp.initFontSelection();

	});


})(window, document, jQuery, window.stApp)
