loadLoginData = function()
{
   if (typeof QueryString.statusMessage == "string")
   {
      document.getElementById('login_message').innerHTML = QueryString.statusMessage;  
   }
}
