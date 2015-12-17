$(document).ready(function(){
   $("#send_email").accordion({collapsible: true, active: false});

});

getDomain = function()
{
  if (!document.getElementById("email_input"))
  {
      console.log("email input 2 is NULL");       
      return "";
  } 
  else
  {
     /* email_addr = "sert";// = String(document.getElementById("email_input").value);
      
      var pos = email_addr.length();
      
      var domain = email_addr(pos + 1);
      alert(domain);
      */
      var txt = document.getElementById("email_input").value;
      var pos = txt.search('@');
      var domain = txt.substring(pos + 1);
      return domain;
  }
}

Element.prototype.remove = function() {
    this.parentElement.removeChild(this);
}

NodeList.prototype.remove = HTMLCollection.prototype.remove = function() {
    for(var i = this.length - 1; i >= 0; i--) {
        if(this[i] && this[i].parentElement) {
            this[i].parentElement.removeChild(this[i]);
        }
    }
}


setLocation = function()
{

   email_domain = document.getElementById("email_location").value;
   window.location = "http://" + email_domain;
   
}

modifySubmitValue = function()
{
   var email_domain = getDomain();
   console.log(email_domain);
   document.getElementById("submit_input").value = "Go to: http://" + email_domain;
   document.getElementById("email_location").value = email_domain;
   document.getElementById("submit_input").onclick = setLocation; //("http://" + email_domain);
   document.getElementById("email_input").remove(); // Removing this node
   document.getElementById("signup_message").innerHTML = "Activation email is sent. Please, check an email for activation letter";
}

registerUser = function(email)
{
   if (!validateEmail(email))
   {
      document.getElementById("signup_message").innerHTML = "Email is invalid";
      return;
   }
   else
   {
      document.getElementById("signup_message").innerHTML = "Registering...";
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
                  document.getElementById("signup_message").innerHTML = xmlhttp.responseText;
                  modifySubmitValue();
                  break;
               case 422:
                  document.getElementById("signup_message").innerHTML = xmlhttp.responseText;
                  break;
               default:
                  document.getElementById("signup_message").innerHTML = xmlhttp.responseText;
                  break;
            }
         }
      }
      xmlhttp.open("GET", "doSignup.php?email=" + encodeURIComponent(email), true);
      xmlhttp.send();
   }
}


