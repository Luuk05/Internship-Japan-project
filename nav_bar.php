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
            if (isset($_SESSION["permissionToEdit"]) && $_SESSION["permissionToEdit"] == true) { //als je bent ingelogd: dan pas mag er een logout button komen
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
                    if (!isset($_SESSION["permissionToEdit"]) || $_SESSION["permissionToEdit"] == false) { //als je nog geen permission hebt om te editen ben je dus nog niet ingelogd
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

                    if (permissionToEdit) {  //als je toegang hebt om te editen: zet namen en rollen naar je eigen naam en rol om zo naar je eigen account te kunnen gaan
                        $.ajax({
                            url: "set_names_and_roles_equal.php",
                            type: "POST",
                            success: function(data) {
                                if (data == "Succes") {
                                    window.location.href = "profile_page.php"; //redirect naar profiel pagina
                                }
                            }
                        });
                        
                    } else {
                        window.location.href = "login.php";
                    }
                }
            });

        });
    
    </script>
    
</nav>