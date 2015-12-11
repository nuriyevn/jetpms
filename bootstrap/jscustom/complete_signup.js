var QueryString = function () {
  // This function is anonymous, is executed immediately and 
  // the return value is assigned to QueryString!
  var query_string = {};
  var query = window.location.search.substring(1);
  var vars = query.split("&");
  for (var i=0;i<vars.length;i++) {
    var pair = vars[i].split("=");
        // If first entry with this name
    if (typeof query_string[pair[0]] === "undefined") {
      query_string[pair[0]] = decodeURIComponent(pair[1]);
        // If second entry with this name
    } else if (typeof query_string[pair[0]] === "string") {
      var arr = [ query_string[pair[0]],decodeURIComponent(pair[1]) ];
      query_string[pair[0]] = arr;
        // If third or later entry with this name
    } else {
      query_string[pair[0]].push(decodeURIComponent(pair[1]));
    }
  } 
    return query_string;
}();

loadRegistrationData = function()
{
   if (typeof QueryString.email == "string")
      document.getElementById('email_input').value = QueryString.email;
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
         if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
         {
            switch (xmlhttp.status)
            {
               case 200:
                  document.getElementById('signup_message').innerHTML = xmlhttp.responseText;
                  window.location = window.location.origin + "/login.php";
                  break;
               case 422:
                  document.getElementById('signup_message').innerHTML = xmlhttp.responseText;
                  break;
            }

         }
      }
      
   }
   xmlhttp.open("POST", "do_complete_signup.php", true);
   xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
   xmlhttp.send("email=" + email 
               +"&token=" + token 
               + "&password1=" + password1
               + "&password2=" + password2);



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


