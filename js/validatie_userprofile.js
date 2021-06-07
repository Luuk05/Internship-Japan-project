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
        // var emailId = $("#email");
        // checkIfEmpty(emailVal, emailId);


        var firstNameVal = $("#first-name").val();
        // var firstNameId = $("#first-name");
        // checkIfEmpty(firstNameVal, firstNameId);

        
        var lastNameVal = $("#last-name").val();
        // var lastNameId = $("#last-name");
        // checkIfEmpty(lastNameVal, lastNameId);


        var dateOfBirthVal = $("#date-of-birth").val();
        // var dateOfBirthId = $("#date-of-birth");
        // checkIfEmpty(dateOfBirthVal, dateOfBirthId);
        

        var nationalityVal = $("#nationality-id :selected").text();
        // var nationalityId = $("#nationality-id");
        // checkSelect(nationalityVal, "Nationality", nationalityId);
        

        var countryIdVal = $("#country-id :selected").text();
        // var countryIdValId = $("#country-id");
        // checkSelect(countryIdVal, "Country", countryIdValId);
        

        var streetAdressVal = $("#street-adress").val();
        // var streetAdressId = $("#street-adress");
        // checkIfEmpty(streetAdressVal, streetAdressId);
        

        var postalCodeVal = $("#postal-code").val();
        // var postalCodeId = $("#postal-code");
        // checkIfEmpty(postalCodeVal, postalCodeId);
        

        var cityVal = $("#city").val();
        // var cityId = $("#city");
        // checkIfEmpty(cityVal, cityId);
        

        var studyVal = $("#study").val();
        // var studyId = $("#study");
        // checkIfEmpty(studyVal, studyId);
        

        var fieldOfStudiesVal = $("#field-of-studies").val();
        // var fieldOfStudiesId = $("#field-of-studies");
        // checkIfEmpty(fieldOfStudiesVal, fieldOfStudiesId);
        

        var graduatedFromVal = $("#graduated-from").val();
        // var graduatedFromId = $("#graduated-from");
        // checkIfEmpty(graduatedFromVal, graduatedFromId);


        var currentlyStudentVal = $("#currently-student :selected").text();
        // var currentlyStudentId = $("#currently-student");
        // checkSelect(currentlyStudentVal, "Currently student?", currentlyStudentId);


        var seekingInternshipVal = $("#seeking-internship :selected").text();
        // var seekingInternshipId = $("#seeking-internship");
        // checkSelect(seekingInternshipVal, "Seeking internship?", seekingInternshipId);


        var openForRealEmploymentVal = $("#open-for-real-employment :selected").text();
        // var openForRealEmploymentId = $("#open-for-real-employment");
        // checkSelect(openForRealEmploymentVal, "Open for real employment?", openForRealEmploymentId);


        var languagesVal = $("#languages :selected").text();
        // var languagesId = $("#languages");
        // checkSelect(languagesVal, "Languages", languagesId);


        var profileTextVal = $("#profile-text").val();
        // var profileTextId = $("#profile-text");
        // checkIfEmpty(profileTextVal, profileTextId);


        var profileImageVal = $("#profile-image").val();
        // var profileImageId = $("#profile-image");
        // checkIfEmpty(profileImageVal, profileImageId);

        var profileVideoVal = $("#profile-video").val();
        // var profileVideoId = $("#profile-video");
        // checkIfEmpty(profileVideoVal, profileVideoId);

        var socialMediaVal = $("#social-media").val();
        // var socialMediaId = $("#social-media");
        // checkIfEmpty(socialMediaVal, socialMediaId);

        var newData = {
            "username": username,
            "password": password,
            "email": emailVal,
            "firstname": firstNameVal,
            "surname": lastNameVal,
            "date_of_birth": dateOfBirthVal,
            "nationality_id": nationalityVal,
            "country_id": countryIdVal,
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
                    console.log(data);
                }
        });
    }


});