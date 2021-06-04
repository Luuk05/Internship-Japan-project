<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Arvo&family=Lato&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style_profile_page.css">
    <title>Your profile page</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="container-1">
    <?php include_once "nav_bar.php";  //stijl = nav_bar_style.css?>
        <div class="container-2">
            <div id="box-profile">
                <form action="" method="post">
                    <p>Modify your account</p>
                    <input type="text" placeholder="Username" name="username" id="username" class="input-algemeen">
                   
                    <hr>
                    <div id="andere-input-velden">
                        <?php include_once "register_inputfields.php";?>
                    </div>


                    <input type="submit" value="Modify" class="registreer-knop" id="submit-button">
                    <p id="account-gemaakt"></p>
                </form>
            </div>
        </div>
    </div>
    <script src="js/validatie_userprofile.js"></script>
</body>
</html>