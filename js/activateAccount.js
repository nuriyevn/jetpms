loadRegistrationData = function()
{
   if (typeof QueryString.email == "string")
      document.getElementById('email_input').value = QueryString.email;
   if (typeof QueryString.token == "string")
      document.getElementById('token_input').value = QueryString.token;
}

completeSignup = function(email, token, password1, password2)
{
   //console.log("completeSignup() email=" + email + "; token = " + token);

   var message = "";

   if (!validateEmail(email))
   {
      message = "Email is invalid<br>";
   }
   
   if (password1.length < 6)
   {
      message += "Password length must be at least 6 characters<br>";
   } 
   
   if (password2 != password1)
   {
      message += "Passwords must matches<br>";
   }


   if (message.length > 0)
   {
      document.getElementById('signup_message').innerHTML = message;
      return;
   }

   
      
   {
      document.getElementById('signup_message').innerHTML = "Finishing...";
      if (window.XMLHttpRequest)
      {
         xmlhttp = new XMLHttpRequest();
      }
      else
      {
         xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
      }
      xmlhttp.onreadystatechange = function()
      {
         if (xmlhttp.readyState == 4)
         {
            switch (xmlhttp.status)
            {
               case 200:
                  document.getElementById('signup_message').innerHTML = xmlhttp.responseText;
                  window.location = window.location.origin + "/login.php?statusMessage=" + xmlhttp.responseText;
                  break;
               case 422:
                  document.getElementById('signup_message').innerHTML = xmlhttp.responseText;
                  break;
            }

         }
      }
      
   }
   xmlhttp.open("POST", "doActivateAccount.php", true);
   xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
   xmlhttp.send("email=" + encodeURIComponent(email) 
               +"&token=" + encodeURIComponent(token) 
               + "&password1=" + encodeURIComponent(password1)
               + "&password2=" + encodeURIComponent(password2));



   /*if (email == "")
   {
      document.getElementById("signup_message").innerHTML = "Email is empty";
      return;
   }
   if (token == "")
   {
      document.getElementById("signup_message").innerHTML += "Token is empty";
      return;
   }

   document.getElementById("signup_message").innerHTML += "Email and token are specified";*/

}


