$("#username").on("input", function() {
    $("#username").removeAttr("style");
    $("#username").attr("placeholder", "Username");
    
});
$("#password").on("input", function() {
    $("#password").removeAttr("style");
});
$("#repeat-password").on("input", function() {
    $("#repeat-password").removeAttr("style");
});
$("#role ").on("change", function() {
    $("#role").removeAttr("style");
});



$("#submit-button").on("click", function(event) {
    event.preventDefault();

    sessionStorage.setItem("showMessageWhenDone", "false");

    var userName = $("#username").val();
    var passWord = $("#password").val();
    var repeatPassWord = $("#repeat-password").val();
    var roles = $("#role :selected").text();
    valideer(userName, passWord, repeatPassWord, roles);

    function valideer(userName, passWord, repeatPassWord, roles) {
        
        $.ajax({
            url: "check_username_exists.php",
            type: "POST",
            data: 
                {
                    "userName": userName
                }
                ,
                success: function(PHPechoUsername) {
                    var username = valideerNaam(PHPechoUsername, userName);
                    var password = valideerPassword(passWord, repeatPassWord);
                    var role = valideerRoles(roles);

                    if (username != "" && password != "" && role != "") {
                        maakAccount(username, password, role);
                    }
                }
        });
    }

    function valideerNaam(PHPechoUsername, userName) {
        if (userName != "") {
            if (userName.trim().length > 0) {
                if (PHPechoUsername == "") {
                    $("#username").val("");
                    $("#username").attr("placeholder","This username already exists.");
                    maakInputRood("#username");
                } else {
                    return PHPechoUsername;
                }
            }
                
        }
        maakInputRood("#username");
        return PHPechoUsername;
    }

    function valideerPassword(passWord, repeatPassWord) {
        var passWord = passWord;
        var repeatPassWord = repeatPassWord;

        if (passWord != "" && repeatPassWord == passWord) {
            return passWord;
        } else {
            if (passWord != "" && repeatPassWord != passWord) {
                maakInputRood("#repeat-password");
            } else {
                maakInputRood("#password");
                maakInputRood("#repeat-password");
            }
            return "";
        }
    }

    function valideerRoles(roles) {
       var role = roles;
       if (role == "Intern") {
            return "1";
       } else if (role == "Company") {
            return "2";
       } else if (role == "Education") {
            return "3";
       } else {
            maakInputRood("#role");
            return "";
       }
    }

    function maakInputRood(id) {
        $(id).css("border-color", "red");
    }

    function maakAccount(username, password, role) {
        var username = username;
        var password = password;
        var role = role;

        $.ajax({
            url: "maak_account.php",
            type: "POST",
            data: 
                {
                    "userName": username,
                    "passWord": password,
                    "role": role
                },
                success: function(data) {
                    // console.log(data);
                    if (data != "") {
                        console.log(data);
                        sessionStorage.setItem("showMessageWhenDone", "true");
                        window.location.reload();
                    } else {
                        sessionStorage.setItem("showMessageWhenDone", "false");
                    }
                }
        });
    }

});


if (sessionStorage.getItem("showMessageWhenDone") == "true") {
    $("#account-gemaakt").text("Account made!");
    setTimeout(function() { 
        $("#account-gemaakt").text("Redirecting to log-in in 3");
    }, 2000);
    setTimeout(function() { 
        $("#account-gemaakt").text("Redirecting to log-in in 2");
    }, 3000);
    setTimeout(function() { 
        $("#account-gemaakt").text("Redirecting to log-in in 1");
    }, 4000);
    setTimeout(function() { 
        window.location.replace("login.php");
    }, 5000);

    sessionStorage.setItem("showMessageWhenDone", "false")
}





