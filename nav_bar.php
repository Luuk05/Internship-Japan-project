<link rel="stylesheet" href="css/nav_bar_style.css">
<nav>
    <ul>
        <!-- <img src="images/internshiplogo.png" alt="Intership Japan"> -->
        <li><a href="index2.php">Search</a></li>
        <li><a href="">About us</a></li>
        <li><a href="">F.A.Q.</a></li>
    </ul>
    <div id="buttons">
        <?php 
            if (isset($_SESSION["permissionToEdit"]) && $_SESSION["permissionToEdit"] == true) {
                echo '<a href = "logout.php" id="logout-button-nav">Log out.</a>';
            } else {
                echo '<style>
                    #buttons {
                        width: auto;
                    }
                </style>';
            }
        ?>
        <a href= "" id="profile-login">
            <button id="sing-in-up">
                <?php 
                    if (!isset($_SESSION["permissionToEdit"])) {
                        echo "Sign in/up";
                    } else {
                        echo "My Account";
                    }
                ?>
            </button>
        </a>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $("#profile-login").click(function(e) {
            e.preventDefault();

            $.ajax({
                url: "get_permission.php",
                type: "POST",
                success: function(data) {
                    var permissionToEdit = data;
                    console.log(data);

                    if (permissionToEdit) {
                        $.ajax({
                            url: "set_names_and_roles_equal.php",
                            type: "POST",
                            success: function(data) {
                                if (data == "Succes") {
                                    window.location.replace("profile_page.php");
                                }
                            }
                        });
                        
                    } else {
                        window.location.replace("login.php");
                    }
                }
            });

        });
    
    </script>
    
</nav>