$("#username").on("input", function() {
    $("#username").removeAttr("style");
});


$("#submit-button").on("click", function(event) {
    event.preventDefault();

    if ($("#username").val() != "" ) {
        console.log("1");
        var username = $("#username").val();
        var password = $("#password").val();

        $.ajax({
            url: "test.php",
            type: "POST",
            data: 
                {
                 "name": username,
                 "password": password
                },
            success: function(data) {
                myObj = JSON.parse(data);
                console.log(myObj[0]);
                // console.log(data);
            },
        });
    } else {
        $("#username").css("border-color", "red");
        $(".box-login").scrollTop(0);
    }
});