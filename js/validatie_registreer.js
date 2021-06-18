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

    sessionStorage.setItem("showMessageWhenDone", "false");  //deze storage is voor als het account maken gelukt is

    var userName = $("#username").val();
    var passWord = $("#password").val();
    var repeatPassWord = $("#repeat-password").val();
    var roles = $("#role :selected").text();                //haal alle velden op en doe ze in de functie
    valideer(userName, passWord, repeatPassWord, roles);  

});


function valideer(userName, passWord, repeatPassWord, roles) {
    $.ajax({
        url: "check_username_exists.php",     //kijk of de username bestaat 
        type: "POST",
        data: 
            {
                "userName": userName         //zend gegeven username naar php code
            }
            ,
            success: function(PHPechoUsername) {
                var username = valideerNaam(PHPechoUsername, userName);   //return van de functies is de waarde van de variabelen
                var password = valideerPassword(passWord, repeatPassWord);
                var role = valideerRoles(roles);

                if (username != "" && password != "" && role != "") {
                    maakAccount(username, password, role);   //als alles goed is, word deze if statement true en kan er een account gemaakt worden
                }
            }
    });
}

function valideerNaam(PHPechoUsername, userName) {
    if (userName != "") {
        if (userName.trim().length > 0) {
            if (PHPechoUsername == "Username already exists") {         // kijk of username al bestaat door de return van de php code te vergelijken
                $("#username").val("");
                $("#username").attr("placeholder","This username already exists.");  //haal het username veldje weg en zet er een placeholder neer zodat de user weet wat hij fout heeft gedaan
                maakInputRood("#username");
                return "";
            } else {
                return PHPechoUsername;
            }
        }
            
    }
    maakInputRood("#username"); //maak het veld rood zodat de user weet dat hij iets mis heeft gedaan
    return PHPechoUsername;
}

function valideerPassword(passWord, repeatPassWord) {   // deze functie vergelijkt de passwords en ook of ze leeg zijn of niet
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

function valideerRoles(roles) {  //checked welke role er is gekozen door de user
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

function maakAccount(username, password, role) {
    var username = username;
    var password = password;
    var role = role;

    $.ajax({
        url: "maak_account.php",
        type: "POST",
        data: 
            {
                "userName": username,   //stuur data naar php zodat er vanaf daar een user gemaakt kan worden
                "passWord": password,
                "role": role
            },
            success: function(data) {
                if (data != "Error") {    //als er geen error is dan word onderstaande storage true zodat de user weet dat er een account is gemaakt
                    sessionStorage.setItem("showMessageWhenDone", "true"); 
                    window.location.reload();
                } else {
                    sessionStorage.setItem("showMessageWhenDone", "false");
                }
            }
    });
}


if (sessionStorage.getItem("showMessageWhenDone") == "true") {  //als alles gelukt is krijgt de user een bericht dat er een account is gemaakt
    $("#account-gemaakt").text("Account made!");
    setTimeout(function() { 
        $("#account-gemaakt").text("Redirecting to log-in in 3");
    }, 1500);
    setTimeout(function() { 
        $("#account-gemaakt").text("Redirecting to log-in in 2");
    }, 2500);
    setTimeout(function() { 
        $("#account-gemaakt").text("Redirecting to log-in in 1");
    }, 3500);
    setTimeout(function() { 
        window.location.href = "login.php";   //na 4.5 seconden word hij naar de login pagina gestuurd zodat de user kan inloggen
    }, 4500);

    sessionStorage.setItem("showMessageWhenDone", "false")
}

function maakInputRood(id) {
    $(id).css("border-color", "red");   //maak border color van een gegeven id rood
}