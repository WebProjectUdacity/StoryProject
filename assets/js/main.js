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
		(function($){
	        $(window).on("load",function(){
	            $("#main").mCustomScrollbar({
	            	theme: "inset-2-dark", // For more themes, see: http://manos.malihu.gr/repository/custom-scrollbar/demo/examples/scrollbar_themes_demo.html
	            	scrollButtons:{
	            		enable: true
	            	}
	            });
	        });
	    })(jQuery);

	};



	// when the document is ready
	// start the init function
	// all of our code
	$(function() {
		
		stApp.init();
		stApp.initToggleMenu();
		stApp.initToggleLogin();

	});


})(window, document, jQuery, window.stApp)