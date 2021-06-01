$("#username").on("input", function() {
    $("#username").removeAttr("style");
});


$("#submit-button").on("click", function(event) {
    event.preventDefault();

    var userName = validateUserName();

    function validateUserName() {
        var userName = $("#username").val();
        validate(userName);  
    }

    function validate(userName) {
        var userName2;
        $.ajax({
            url: "check_username_exists.php",
            type: "POST",
            data: 
                {
                    "userName": userName
                }
                ,
                success: function(data) {
                    console.log("Succes");
                    if (data != " ") {
                        userName2 = data;
                    } else {
                        userName2 = "Name already exists";
                    }
                }
        });
        console.log(userName2);
        return userName2;
    }
    
    console.log(userName);


    
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