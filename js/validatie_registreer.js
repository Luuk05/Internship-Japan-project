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
                    valideerRoles(roles);
                    // var roleAndInformation = 
                }
        });
    }

    function valideerNaam(PHPechoUsername) {
        var userName = PHPechoUsername;
        if (userName != "") {
            return userName;
        } else {
            maakInputRood("#username");
            return "";
        }
    }

    function valideerPassword(passWord, repeatPassWord) {
        var passWord = passWord;
        var repeatPassWord = repeatPassWord;

        if (passWord != "" && repeatPassWord == passWord) {
            return password;
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
       if (role == "intern") {
            valideerIntern();
            // return 
       } else if (role == "company") {
            return valideerCompany();
       } else if (role == "education") {
            return valideerEducation();
       } else {
            maakInputRood("#role");
       }
    }

    function valideerIntern() {
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

        var internInformation = [emailVal, firstNameVal, lastNameVal, dateOfBirthVal, nationalityVal, countryIdVal, streetAdressVal, postalCodeVal, cityVal, studyVal, fieldOfStudiesVal, graduatedFromVal, currentlyStudentVal, seekingInternshipVal, openForRealEmploymentVal, languagesVal, profileTextVal, profileImageVal, profileVideoVal, socialMediaVal];
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

    
    // $.ajax({
    //     url: "check_username_exists.php",
    //     type: "POST",
    //     data: 
    //         {
    //             "userName": userName
    //         },
    //     success: function(data) {
    //         console.log("Data ophalen voor username gelukt.");
    //         if (data != " ") {
    //             userName = data;
    //         } else {
    //             userName = "Naam bestaat al";
    //         }
    //     }
    // });






    // if ($("#username").val() != "" ) {
    //     console.log("1");
    //     var username = $("#username").val();
    //     var password = $("#password").val();

    //     $.ajax({
    //         url: "test.php",
    //         type: "POST",
    //         data: 
    //             {
    //              "name": username,
    //              "password": password
    //             },
    //         success: function(data) {
    //             // myObj = JSON.parse(data);
    //             // console.log(myObj[0]);
    //             console.log("Gelukt");
    //         },
    //     });
    // } else {
    //     $("#username").css("border-color", "red");
    //     $(".box-login").scrollTop(0);
    // }
});