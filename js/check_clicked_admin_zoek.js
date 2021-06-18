$(".resultaat-boxen").click(function() {
    var user_id = $(this).attr('value');

    $.ajax({
        url: "admin_redirect_to_profile.php",
        type: "POST",
        data: 
            {
                "user_id": user_id
            },
            success: function(data) {
                var url = data;
                window.location.href = url;
            }
    });

});