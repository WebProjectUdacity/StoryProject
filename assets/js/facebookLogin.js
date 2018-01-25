
	// This is called with the results from from FB.getLoginStatus().
	function statusChangeCallback(response) {
	console.log('statusChangeCallback');
	console.log(response);
	// The response object is returned with a status field that lets the
	// app know the current login status of the person.
	// Full docs on the response object can be found in the documentation
	// for FB.getLoginStatus().
	if (response.status === 'connected') {
    sLog();
	} else {
    sLog();
	}
}

	function checkLoginState() {
		FB.getLoginStatus(function(response) {
			statusChangeCallback(response);
		});
	}

	  window.fbAsyncInit = function() {
	    FB.init({
	      appId      : '141488683199418',
	      cookie     : true,
	      xfbml      : true,
	      version    : 'v2.11'
	    });

	    FB.AppEvents.logPageView();

      FB.getLoginStatus(function(response) {
        if (response.status === 'connected' && logval === 0) {
          sLog();
        }
      });

	  };

	  (function(d, s, id){
	     var js, fjs = d.getElementsByTagName(s)[0];
	     if (d.getElementById(id)) {return;}
	     js = d.createElement(s); js.id = id;
	     js.src = "https://connect.facebook.net/de_DE/sdk.js#xfbml=1&version=v2.11&appId=141488683199418";
	     fjs.parentNode.insertBefore(js, fjs);
	   }(document, 'script', 'facebook-jssdk'));

		 function sLog() {
			 FB.api('/me', {fields: 'name, email'},  function(response) {
				 socialLogin(response.name, response.email);
			 	});
		 }
