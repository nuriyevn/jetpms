loadLoginData = function()
{
   if (typeof QueryString.statusMessage == "string")
   {
      document.getElementById('login_message').innerHTML = QueryString.statusMessage;  
   }
}


$(document).ready(function(){
   $("#button_id").click(function(){
      
      $.ajax({
         type: 'POST',
         url: '/doLogin.php',
         data: 'login=' + encodeURIComponent(JSON.stringify($("#login_id").val())) + "&password=" + encodeURIComponent(JSON.stringify($("#password_id").val())),
         complete: function(e, xhr, settings){
             // Regular login from login.php
             console.log("e.status = " + e.status);
             console.log(e.responseText);

             if(e.status === 200){
                  console.log("from login.php");
                  console.log(e.responseText);
                  window.location = window.location.origin + "/dashboard/index.php";
             }
             else if(e.status === 401)
             {
                var login_message = $('#login_message');
                login_message.text("Wrong login or password.");
                login_message.css('color', '#0000FF');
                login_message.fadeTo(0, 0.5);
                login_message.fadeTo(200, 1);
             }
             else if (e.status === 302)
             {
                // We came from activateAccount.php
                console.log("from activateAccount.php");
                window.location = window.location.origin + "/dashboard/index.php";
             }
             else if (e.status === 503) {
                 var login_message = $('#login_message');
                 login_message.text("Sorry, service unavailable.");
                 login_message.css('color', '#0000FF');
                 login_message.fadeTo(0, 0.5);
                 login_message.fadeTo(200, 1);
             }

         }

      });
   });
});
