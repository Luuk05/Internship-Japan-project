$("#username").on("input", function() {
    $("#username").removeAttr("style");
});


$("#submit-button").on("click", function(event) {
    event.preventDefault();

    valideer();

    function valideer() {
        var userName = $("#username").val();
        $.ajax({
            url: "check_username_exists.php",
            type: "POST",
            data: 
                {
                    "userName": userName
                }
                ,
                success: function(PHPecho) {
                    console.log("1");
                    var userName = valideerNaam(PHPecho);
                    doDelay();
                    console.log(userName);
                    // valideerPassword();
                }
        });
        
    }

    function valideerNaam(PHPecho) {
        var userName = PHPecho;
        if (userName != " ") {
            console.log("2");
            console.log(userName);
        } else {
            console.log("gebruiker bestaat al");
            //laat gebruiker weten dat de username al bestaat
        }
        return userName;
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