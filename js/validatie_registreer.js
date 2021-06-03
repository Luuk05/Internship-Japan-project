$("#username").on("input", function() {
    $("#username").removeAttr("style");
});



$("#submit-button").on("click", function(event) {
    event.preventDefault();

    var userName = $("#username").val();
    var passWord = $("#password").val();
    var repeatPassWord = $("#repeat-password").val();
    var roles = $("#role").val();
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
                    var username = valideerNaam(PHPechoUsername);
                    var password = valideerPassword(passWord, repeatPassWord);
                    var roleAndInformation = valideerRoles(roles);

                    if (username != "" && password != "") {
                        var counter = 0;
                        for (i = 0; i < roleAndInformation.length; i++) {
                            if (!roleAndInformation[i] == "") {
                                counter++;
                            } else {
                                break;
                            }
                        }

                        if (counter == roleAndInformation.length) {
                            console.log("noice");
                            maakAccount(username, password, roleAndInformation);
                        }
                    }
                }
        });
    }

    function valideerNaam(PHPechoUsername) {
        var userName = PHPechoUsername;
        if (userName != "") {
            return userName;
        } else {
            maakInputRood("#username");
            return userName;
        }
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
            return passWord;
        }
    }

    function valideerRoles(roles) {
       var role = roles;
       if (role == "intern") {
            return valideerIntern(1);
            // return 
       } else if (role == "company") {
            return valideerCompany(2);
       } else if (role == "education") {
            return valideerEducation(3);
       } else {
            maakInputRood("#role");
       }
    }

    function valideerIntern(role) {
        var roleVal = role;

        var emailVal = $("#email").val();
        var emailId = $("#email");
        checkIfEmpty(emailVal, emailId);


        var firstNameVal = $("#first-name").val();
        var firstNameId = $("#first-name");
        checkIfEmpty(firstNameVal, firstNameId);

        
        var lastNameVal = $("#last-name").val();
        var lastNameId = $("#last-name");
        checkIfEmpty(lastNameVal, lastNameId);


        var dateOfBirthVal = $("#date-of-birth").val();
        var dateOfBirthId = $("#date-of-birth");
        checkIfEmpty(dateOfBirthVal, dateOfBirthId);
        

        var nationalityVal = $("#nationality-id :selected").text();
        var nationalityId = $("#nationality-id");
        checkSelect(nationalityVal, "Nationality", nationalityId);
        

        var countryIdVal = $("#country-id :selected").text();
        var countryIdValId = $("#country-id");
        checkSelect(countryIdVal, "Country", countryIdValId);
        

        var streetAdressVal = $("#street-adress").val();
        var streetAdressId = $("#street-adress");
        checkIfEmpty(streetAdressVal, streetAdressId);
        

        var postalCodeVal = $("#postal-code").val();
        var postalCodeId = $("#postal-code");
        checkIfEmpty(postalCodeVal, postalCodeId);
        

        var cityVal = $("#city").val();
        var cityId = $("#city");
        checkIfEmpty(cityVal, cityId);
        

        var studyVal = $("#study").val();
        var studyId = $("#study");
        checkIfEmpty(studyVal, studyId);
        

        var fieldOfStudiesVal = $("#field-of-studies").val();
        var fieldOfStudiesId = $("#field-of-studies");
        checkIfEmpty(fieldOfStudiesVal, fieldOfStudiesId);
        

        var graduatedFromVal = $("#graduated-from").val();
        var graduatedFromId = $("#graduated-from");
        checkIfEmpty(graduatedFromVal, graduatedFromId);


        var currentlyStudentVal = $("#currently-student :selected").text();
        var currentlyStudentId = $("#currently-student");
        checkSelect(currentlyStudentVal, "Currently student?", currentlyStudentId);


        var seekingInternshipVal = $("#seeking-internship :selected").text();
        var seekingInternshipId = $("#seeking-internship");
        checkSelect(seekingInternshipVal, "Seeking internship?", seekingInternshipId);


        var openForRealEmploymentVal = $("#open-for-real-employment :selected").text();
        var openForRealEmploymentId = $("#open-for-real-employment");
        checkSelect(openForRealEmploymentVal, "Open for real employment?", openForRealEmploymentId);


        var languagesVal = $("#languages :selected").text();
        var languagesId = $("#languages");
        checkSelect(languagesVal, "Languages", languagesId);


        var profileTextVal = $("#profile-text").val();
        var profileTextId = $("#profile-text");
        checkIfEmpty(profileTextVal, profileTextId);


        var profileImageVal = $("#profile-image").val();
        var profileImageId = $("#profile-image");
        checkIfEmpty(profileImageVal, profileImageId);

        var profileVideoVal = $("#profile-video").val();
        var profileVideoId = $("#profile-video");
        checkIfEmpty(profileVideoVal, profileVideoId);

        var socialMediaVal = $("#social-media").val();
        var socialMediaId = $("#social-media");
        checkIfEmpty(socialMediaVal, socialMediaId);

        var internInformation = [roleVal, emailVal, firstNameVal, lastNameVal, dateOfBirthVal, nationalityVal, countryIdVal, streetAdressVal, postalCodeVal, cityVal, studyVal, fieldOfStudiesVal, graduatedFromVal, currentlyStudentVal, seekingInternshipVal, openForRealEmploymentVal, languagesVal, profileTextVal, profileImageVal, profileVideoVal, socialMediaVal];
        return internInformation;
        //nu for loop en kijk of het er in zit
        // return ArrayMetWaardes;
    }

    function valideerCompany() {
        

        // return ArrayMetWaardes;
    }

    function valideerEducation() {
        

        // return ArrayMetWaardes;
    }

    function maakInputRood(id) {
        $(id).css("border-color", "red");
        $("#box-login").scrollTop(0);
    }

    function checkIfEmpty(inputValue, inputId) {
        if (inputValue != "") {
            
        } else {
            maakInputRood(inputId);
        }
    }

    function checkSelect(value, value2, id) {
        if (value == value2) {
            maakInputRood(id);
        } else {

        }
    }

    function maakAccount(username, password, roleAndInformation) {
        var username = username;
        var password = password;
        var roleAndInformation = roleAndInformation;

        $.ajax({
            url: "maak_account.php",
            type: "POST",
            data: 
                {
                    "userName": username,
                    "passWord": password,
                    "roleAndInformation": roleAndInformation
                },
                success: function(data) {
                    console.log(data);
                }
        });
    }


});