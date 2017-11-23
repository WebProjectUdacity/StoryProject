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

	};



	// when the document is ready
	// start the init function
	// all of our code
	$(function() {
		
		stApp.init();
		stApp.initToggleMenu();

	});


})(window, document, jQuery, window.stApp)