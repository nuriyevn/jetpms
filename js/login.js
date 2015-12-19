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
             if(e.status === 200){
         window.location = window.location.origin + "/dashboard.php";
             }else if(e.status === 401){
                  $("#login_message").html("Unauthorized");
             }else{

             }
         }
      });
   });   

});
