loadRegistrationData = function () {
    if (typeof QueryString.email == "string")
        document.getElementById('email_input').value = QueryString.email;
    if (typeof QueryString.reg_token == "string")
        document.getElementById('token_input').value = QueryString.reg_token;
}

activateAccount = function (email, token, password1, password2) {
    //console.log("activateAccount() email=" + email + "; token = " + token);

    var message = "";

    if (!validateEmail(email)) {
        message = "Email is invalid<br>";
    }

    if (password1.length < 6) {
        message += "Password length must be at least 6 characters<br>";
    }

    if (password2 != password1) {
        message += "Passwords must matches<br>";
    }


    if (message.length > 0) {
        document.getElementById('signup_message').innerHTML = message;
        return;
    }


    {
        document.getElementById('signup_message').innerHTML = "Registering...";
        if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        }
        else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4) {
                switch (xmlhttp.status) {
                    case 200:
                        document.getElementById('signup_message').innerHTML = xmlhttp.responseText;
                        $.ajax({
                            type: 'POST',
                            url: '/login/doLogin.php',
                            data: 'login=' + encodeURIComponent(JSON.stringify(email)) + '&password=' + encodeURIComponent(JSON.stringify(password1)) + '&from=' + encodeURIComponent(JSON.stringify('accountActivation')),
                            complete: function(e, xhr, setting)
                            {
                                if (e.status === 302)
                                {
                                    console.log("activateAccount->DoActivateAccount->doLogin="+ e.responseText);
                                    alert(e.responseText);
                                    window.location = window.location.origin + "/login/index.php";//?statusMessage=" + xmlhttp.responseText;
                                }
                            }
                        });
                         break;
                    case 422:
                        document.getElementById('signup_message').innerHTML = xmlhttp.responseText;
                        break;
                    case 500:
                    default:
                        //document.getElementById('signup_message').innerHTML = "Internal server error (500)";
                        document.getElementById('signup_message').innerHTML = xmlhttp.responseText;
                        break;

                }

            }
        }

    }
    xmlhttp.open("POST", "/signup/doActivateAccount.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("email=" + encodeURIComponent(email)
        + "&reg_token=" + encodeURIComponent(token)
        + "&password1=" + encodeURIComponent(password1)
        + "&password2=" + encodeURIComponent(password2));


}


