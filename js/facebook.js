////////////////////////////////////////////////////////////
/*
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '287911227924206', // App ID
      //channelUrl : '//WWW.plazaphnompenh/channel.html', // Channel File
      status     : true, // check login status
      cookie     : true, // enable cookies to allow the server to access the session
      xfbml      : true,  // parse XFBML
	  oauth		 : true,
    });

    // Additional initialization code here
  };

  // Load the SDK Asynchronously
  (function(d){
     var js, id = 'facebook-jssdk'; if (d.getElementById(id)) {return;}
     js = d.createElement('script'); js.id = id; js.async = true;
     js.src = "//connect.facebook.net/en_US/all.js";
     d.getElementsByTagName('head')[0].appendChild(js);
   }(document));
*/
////////////////////////////////////////////////////////
window.fbAsyncInit = function() {
  FB.init({ 
  		appId: '287911227924206', 
		channelUrl : '//WWW.PLAZAPHNOMPENH.COM/channel.html', // Channel 
	    status: true, 
	    cookie: true,
	    xfbml: true,
	    oauth: true
  });

  function updateButton(response) {
    var button = document.getElementById('fb-auth');
		
    if (response.authResponse) {
      //user is already logged in and connected
	  //alert('user is already logged in and connected');
      var userInfo = document.getElementById('user-info');
      FB.api('/me', function(response) {
        userInfo.innerHTML = '<img src="https://graph.facebook.com/' 
	  + response.id + '/picture" align="top">' + response.name;
        button.innerHTML = 'Logout';
		$('#login').hide();
		$('#register').hide();
		$('#logout').css({
			'background-image'	: 'none',
			'padding-left'		: '8px',
			'border-left'		: '1px #CCC solid',
		});
      });
      button.onclick = function() {
        FB.logout(function(response) {
          var userInfo = document.getElementById('user-info');
          userInfo.innerHTML="";
		  location.reload(true);
	});
      };
    } else {
      //user is not connected to your app or logged out
	  //alert('user is not connected to your app or logged out');
      button.innerHTML = 'Login with Facebook';
      button.onclick = function() {
        FB.login(function(response) {
	  if (response.authResponse) {
            FB.api('/me', function(response) {
	      var userInfo = document.getElementById('user-info');
	      userInfo.innerHTML = 
                '<img src="https://graph.facebook.com/' 
	        + response.id + '/picture" style="margin-right:5px"/>' 
	        + response.name;
	    });	   
          } else {
            //user cancelled login or did not grant authorization
          }
        }, {scope:'email'});  	
      }
    }
  }

  // run once with current status and whenever the status changes
  FB.getLoginStatus(updateButton);
  FB.Event.subscribe('auth.statusChange', updateButton);	
};
	
(function() {
  var e = document.createElement('script'); e.async = true;
  e.src = document.location.protocol 
    + '//connect.facebook.net/en_US/all.js';
  document.getElementById('fb-root').appendChild(e);
}());
