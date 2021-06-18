$(".resultaat-boxen").click(function() {
    var user_id = $(this).attr('value');   //als de div word geklikt dan gaat de value van de div (user_id) via een ajax call naar het profiel van de user met dat user_id

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