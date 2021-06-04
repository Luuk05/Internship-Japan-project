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
                    var username = valideerNaam(PHPechoUsername, userName);
                    var password = valideerPassword(passWord, repeatPassWord);
                    
                    valideerRoles(username, password);

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
        return "";
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

    function valideerRoles(username, password) {
        $.ajax({
            url: "check_roles.php",
            type: "POST",
                success: function(data) {
                    var role = data;
                    if (role == 1) {
                        var newData = valideerIntern();
                    } else if (role == 2) {
                        var newData = valideerCompany();
                    } else if (role == 3) {
                        var newData = valideerEducation();
                    }


                    if (username != "" && password != "") {
                        var newData = [];
                        for (i = 0, counter = 0; i < newData.length; i++) {
                            if (newData[i] != "") {
                                if ( newData[i].trim().length > 0 ) {
                                    newData[counter] = newData[i];
                                    counter++;
                                    console.log(newData[counter]);
                                } 
                            }   
                        }
                        if (newData.length > 0) {

                        }

                        if (counter == newData.length) {
                            console.log("noice");
                            // veranderGegevens(username, password, newData);                        
                        }
                    }
                    
                }
        });
       
    }

    function valideerIntern() {

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

        var newData = [emailVal, firstNameVal, lastNameVal, dateOfBirthVal, nationalityVal, countryIdVal, streetAdressVal, postalCodeVal, cityVal, studyVal, fieldOfStudiesVal, graduatedFromVal, currentlyStudentVal, seekingInternshipVal, openForRealEmploymentVal, languagesVal, profileTextVal, profileImageVal, profileVideoVal, socialMediaVal];
        return newData;
    }

    function valideerCompany() {
        

        // return ArrayMetWaardes;
    }

    function valideerEducation() {
        

        // return ArrayMetWaardes;
    }

    function maakInputRood(id) {
        $(id).css("border-color", "red");
        $("#box-profile").scrollTop(0);
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

    // function maakAccount(username, password, roleAndInformation) {
    //     var username = username;
    //     var password = password;
    //     var roleAndInformation = roleAndInformation;

    //     $.ajax({
    //         url: "maak_account.php",
    //         type: "POST",
    //         data: 
    //             {
    //                 "userName": username,
    //                 "passWord": password,
    //                 "roleAndInformation": roleAndInformation
    //             },
    //             success: function(data) {
    //                 console.log(data);
    //             }
    //     });
    // }


});