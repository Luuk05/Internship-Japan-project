$(".recente-stage-plek").click(function() {
    var user_id = $(this).attr('value');

    
    $.ajax({ 
        url: "redirect_to_profile.php",   //als de div word geklikt dan gaat de value van de div (user_id) via een ajax call naar het profiel van de user met dat user_id
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


