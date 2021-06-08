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
    valideer(userName, passWord, repeatPassWord);

    function valideer(userName, passWord, repeatPassWord) {
        $.ajax({
            url: "check_username_exists.php",
            type: "POST",
            data: 
                {
                    "userName": userName
                }
                ,
                success: function(PHPechoUsername) {
                    var username = valideerNaam(PHPechoUsername);
                    var password = valideerPassword(passWord, repeatPassWord);
                    
                    valideerRoles(username, password);

                }
        });
    }

    function valideerNaam(PHPechoUsername) {
           
        if (PHPechoUsername == "Exists") {
            $("#username").val("");
            $("#username").attr("placeholder","This username already exists.");
            maakInputRood("#username");
        } else {
            return PHPechoUsername;
        }
        return "";
    }

    function valideerPassword(passWord, repeatPassWord) {
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
            url: "check_roles.php",
            type: "POST",
                success: function(data) {
                    var role = data;
                    if (role == 1) {
                        var newData = valideerIntern(username, password);
                    } else if (role == 2) {
                        var newData = valideerCompany(username, password);
                    } else if (role == 3) {
                        var newData = valideerEducation(username, password);
                    }
                
                    veranderGegevens(newData);           
                }
        });
       
    }

    function valideerIntern(username, password) {

        var emailVal = $("#email").val();

        var firstNameVal = $("#first-name").val();
        
        var lastNameVal = $("#last-name").val();

        var dateOfBirthVal = $("#date-of-birth").val();

        // var nationality_id = $("#nationality_id :selected").text();

        // var country_id = $("#country_id :selected").text();

        var streetAdressVal = $("#street-adress").val();
        
        var postalCodeVal = $("#postal-code").val();

        var cityVal = $("#city").val();

        var studyVal = $("#study").val();
        
        var fieldOfStudiesVal = $("#field-of-studies").val();

        var graduatedFromVal = $("#graduated-from").val();

        var currentlyStudentVal = $("#currently-student :selected").text();

        var seekingInternshipVal = $("#seeking-internship :selected").text();

        var openForRealEmploymentVal = $("#open-for-real-employment :selected").text();

        // var languagesVal = $("#languages :selected").text();

        var profileTextVal = $("#profile-text").val();

        var profileImageVal = $("#profile-image").val();

        var profileVideoVal = $("#profile-video").val();

        var socialMediaVal = $("#social-media").val();

        var newData = {
            "username": username,
            "password": password,
            "email": emailVal,
            "firstname": firstNameVal,
            "surname": lastNameVal,
            "date_of_birth": dateOfBirthVal,
            // "nationality_id": nationality_id,
            // "country_id": country_id,
            "street_adress": streetAdressVal,
            "postal_code": postalCodeVal,
            "city": cityVal,
            "study": studyVal,
            "field_of_studies": fieldOfStudiesVal,
            "graduated_from": graduatedFromVal,
            "currently_student": currentlyStudentVal,
            "seeking_internship": seekingInternshipVal,
            "openfor_real_employment": openForRealEmploymentVal,
            // "languages": languagesVal,
            "profiletext": profileTextVal,
            "profileimage": profileImageVal,
            "video": profileVideoVal,
            "social_media": socialMediaVal
        };
        return newData;
    }

    function valideerCompany(username, password) {
        

        // return ArrayMetWaardes;
    }

    function valideerEducation(username, password) {
        

        // return ArrayMetWaardes;
    }

    function maakInputRood(id) {
        $(id).css("border-color", "red");
        $("#box-profile").scrollTop(0);
    }

    // function checkIfEmpty(inputValue, inputId) {
    //     if (inputValue != "") {
            
    //     } else {
    //         maakInputRood(inputId);
    //     }
    // }

    // function checkSelect(value, value2, id) {
    //     if (value == value2) {
    //         maakInputRood(id);
    //     } else {

    //     }
    // }

    function veranderGegevens(newData) {
        var newData = newData;

        $.ajax({
            url: "verander_gegevens.php",
            type: "POST",
            data: 
                {
                    "newData": newData,
                },
                success: function(data) {
                    if (data != "Error") {
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
    $("#box-profile").scrollTop(1500);
    $("#data-veranderd").text("Data changed!");
    sessionStorage.setItem("showMessageWhenDone", "false");
}



