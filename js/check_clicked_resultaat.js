$(".resultaat-boxen").click(function(e) {
    var user_id = $(this).attr('value');
    console.log(user_id);

    $.ajax({
        url: "redirect_to_profile.php",
        type: "POST",
        data: 
            {
                "user_id": user_id
            },
            success: function(data) {
                var url = data;
                window.location.href = url;
                // setTimeout(function(){

                //     window.location.href = url;
                // }, 0);
            }
    });

});


