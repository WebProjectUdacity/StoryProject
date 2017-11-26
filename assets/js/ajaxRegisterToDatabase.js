/*Sends the signup data to the createUser.php to add theme
 to the database.
*/

$("#login-signup").on("click", "#signup", function(){
     $.ajax({
        type: 'POST',
        url: 'components/database/createUser.php',
        data: $('#login-signup').serialize(),
         success: function (data) {
         },
         error: function(jqXHR, textStatus) {
     alert( "Request failed: " + textStatus );
   },
      });
  });
