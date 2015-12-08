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

   email_domain = document.getElementById("submit_input").value;
   window.location = "http://" + email_domain;
}

modifySubmitValue = function()
{
   var email_domain = getDomain();
   if (!document.getElementById("submit_input"))
   {
      console.log("Submit input not found!");
   }
   else
   {
      console.log(email_domain);
      document.getElementById("submit_input").value = email_domain;
      document.getElementById("submit_input").onclick = setLocation; //("http://" + email_domain);
      document.getElementById("email_input").remove(); // Removing this node
      document.getElementById("please_signup").innerHTML = "Click the button below to check your email at:";
      //window.location = "http://" + email_domain;      

   }
}


