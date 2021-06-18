
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

    sessionStorage.setItem("showMessageWhenDone", "false");   //deze storage is voor als het account maken gelukt is

    var userName = $("#username").val();
    var passWord = $("#password").val();
    var repeatPassWord = $("#repeat-password").val();        //haal alle nieuwe velden op en zet ze in de functie
    valideer(userName, passWord, repeatPassWord);

});


function valideer(userName, passWord, repeatPassWord) {
    $.ajax({
        url: "check_username_exists.php",   //kijk of gebruikersnaam bestaat
        type: "POST",
        data: 
            {
                "userName": userName   //zend gegeven username naar php code
            }
            ,
            success: function(PHPechoUsername) {
                var username = valideerNaam(PHPechoUsername);    //return van de functies is de waarde van de variabelen
                var password = valideerPassword(passWord, repeatPassWord);
                
                valideerRoles(username, password);  //kijk welke role de user heeft als hij iets wilt aanpassen en neemt gelijk username en password mee

            }
    });
}

function valideerNaam(PHPechoUsername) {  //kijkt alleen of username al bestaat
    
    if (PHPechoUsername == "Username already exists") {
        $("#username").val("");
        $("#username").attr("placeholder","This username already exists.");
        maakInputRood("#username");
    } else {
        return PHPechoUsername;
    }
    return "";
}

function valideerPassword(passWord, repeatPassWord) {   //kijk of password zelfde is als repeatpassword
    var passWord = passWord;
    var repeatPassWord = repeatPassWord;
    
    if (password != "" && repeatPassWord == passWord) {
        return passWord;
    } else {
        if (repeatPassWord != passWord) {
            maakInputRood("#repeat-password");
        } else {
            maakInputRood("#password");
            maakInputRood("#repeat-password");
        }
        return "";
    }
}

function valideerRoles(username, password) {
    $.ajax({
        url: "check_roles.php",  //kijk welke role de user heeft
        type: "POST",
            success: function(data) {  //dan pas kun je de data (role) gebruiken om specefiek een rol te valideren
                var role = data;
                if (role == 1) {
                    var newData = valideerIntern(username, password);
                } else if (role == 2) {
                    var newData = valideerCompany(username, password);
                } else if (role == 3) {
                    var newData = valideerEducation(username, password);
                }
            
                veranderGegevens(newData);      //als de nieuwe data is gemaakt dan kun je de gegevens van de user veranderen
            }
    });

}

function valideerIntern(username, password) {   //alle nieuwe data word opgehaald door de input velden te checken

    var emailVal = $("#email").val();  

    var firstNameVal = $("#first-name").val();
    
    var lastNameVal = $("#last-name").val();

    var dateOfBirthVal = $("#date-of-birth").val();

    var nationality_id = $("#nationality-id :selected").val();
    if (nationality_id == "Nationality") {
        nationality_id = "";
    }

    var country_id = $("#country-id :selected").val();
    if (country_id == "Country") {
        country_id = "";
    }

    var streetAdressVal = $("#street-adress").val();
    
    var postalCodeVal = $("#postal-code").val();

    var cityVal = $("#city").val();

    var studyVal = $("#study").val();
    
    var fieldOfStudiesVal = $("#field-of-studies").val();

    var graduatedFromVal = $("#graduated-from").val();

    var currentlyStudentVal = $("#currently-student :selected").val();
    if (currentlyStudentVal == "Currently student?") {
        currentlyStudentVal = "";
    }

    var seekingInternshipVal = $("#seeking-internship :selected").text();
    if (seekingInternshipVal == "Seeking internship?") {
        seekingInternshipVal = "";
    }

    var openForRealEmploymentVal = $("#open-for-real-employment :selected").val();
    if (openForRealEmploymentVal == "Open for real employment?") {
        openForRealEmploymentVal = "";
    }

    var languagesVal = $("#languages :selected").val();
    if (languagesVal == "Languages") {
        languagesVal = "";
    }

    var profileTextVal = $("#profile-text").val();

    var profileImageVal = $("#profile-image").val();

    var profileVideoVal = $("#profile-video").val();

    var socialMediaVal = $("#social-media").val();

    var newData = {  //zet alles in associative array zodat ik later de keys kan gebruiken
        "username": username,
        "password": password,
        "email": emailVal,
        "firstname": firstNameVal,
        "surname": lastNameVal,
        "date_of_birth": dateOfBirthVal,
        "nationality_id": nationality_id,
        "country_id": country_id,
        "street_adress": streetAdressVal,
        "postal_code": postalCodeVal,
        "city": cityVal,
        "study": studyVal,
        "field_of_studies": fieldOfStudiesVal,
        "graduated_from": graduatedFromVal,
        "currently_student": currentlyStudentVal,
        "seeking_internship": seekingInternshipVal,
        "openfor_real_employment": openForRealEmploymentVal,
        "languages": languagesVal,
        "profiletext": profileTextVal,
        "profileimage": profileImageVal,
        "video": profileVideoVal,
        "social_media": socialMediaVal
    };

    return newData;  //return de array
}

function valideerCompany(username, password) {  //zelfde als bij intern maar dan met net iets andere data

    var emailVal = $("#email").val();

    var firstNameVal = $("#first-name").val();
    
    var lastNameVal = $("#last-name").val();

    var fullNameVal = firstNameVal + " " + lastNameVal;

    var companyNameVal = $("#company-name").val();

    var country_id = $("#country-id :selected").val();
    if (country_id == "Country") {
        country_id = "";
    }

    var streetAdressVal = $("#street-adress").val();
    
    var postalCodeVal = $("#postal-code").val();

    var cityVal = $("#city").val();

    var profileTextVal = $("#profile-text").val();

    var profileImageVal = $("#profile-image").val();

    var profileVideoVal = $("#profile-video").val();

    var websiteLink = $("#website-link").val();

    var positionVal = $("#position").val();

    var positionTextVal = $("#position-text").val();


    var newData = {
        
        "username": username,
        "password": password,
        "email_contactperson": emailVal,
        "contactperson": fullNameVal,
        "companyname": companyNameVal,
        "country_id": country_id,
        "street_adress": streetAdressVal,
        "postal_code": postalCodeVal,
        "city": cityVal,
        "profiletext": profileTextVal,
        "logo": profileImageVal,
        "video": profileVideoVal,
        "website": websiteLink,
        "position": positionVal,
        "positiontext": positionTextVal
    };

    return newData;
}

function valideerEducation(username, password) {    //zelfde als bij intern maar dan met net iets andere data
    var emailVal = $("#email").val();

    var firstNameVal = $("#first-name").val();
    
    var lastNameVal = $("#last-name").val();

    var fullNameVal = firstNameVal + " " + lastNameVal;

    var educationNameVal = $("#education-name").val();

    var country_id = $("#country-id :selected").val();
    if (country_id == "Country") {
        country_id = "";
    }

    var streetAdressVal = $("#street-adress").val();
    
    var postalCodeVal = $("#postal-code").val();

    var cityVal = $("#city").val();

    var profileTextVal = $("#profile-text").val();

    var profileImageVal = $("#profile-image").val();

    var profileVideoVal = $("#profile-video").val();

    var websiteLink = $("#website-link").val();

    var positionVal = $("#position").val();

    var positionTextVal = $("#position-text").val();


    var newData = {
        
        "username": username,
        "password": password,
        "email_contactperson": emailVal,
        "contactperson": fullNameVal,
        "educationNameVal": educationNameVal,
        "country_id": country_id,
        "street_adress": streetAdressVal,
        "postal_code": postalCodeVal,
        "city": cityVal,
        "profiletext": profileTextVal,
        "logo": profileImageVal,
        "video": profileVideoVal,
        "website": websiteLink,
        "position": positionVal,
        "positiontext": positionTextVal
    };

    return newData; 
}


function veranderGegevens(newData) { //met de nieuwe data, stuur data naar php
    var newData = newData;

    $.ajax({
        url: "verander_gegevens.php",
        type: "POST",
        data: 
            {
                "newData": newData,
            },
            success: function(data) {
                if (data == "Changed data succesfull") {   //als het veranderen van gegevens waar is dan laat message zien na reload
                    sessionStorage.setItem("showMessageWhenDone", "true");
                    window.location.reload();

                } else {
                    sessionStorage.setItem("showMessageWhenDone", "false");
                }

            }
    });
}


if (sessionStorage.getItem("showMessageWhenDone") == "true") { //als de data succescol veranderd is dan scroll naar onder en laat zien dat de data veranderd is
    $("#box-profile").scrollTop(1500);
    $("#data-veranderd").text("Data changed!");
    sessionStorage.setItem("showMessageWhenDone", "false");
}

function maakInputRood(id) {   //maak rood en scroll naar boven zodat de gebruiker kan zien wat hij fout heeft gedaan
    $(id).css("border-color", "red");
    $("#box-profile").scrollTop(0); 
}

