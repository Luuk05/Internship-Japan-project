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
        <a href= 
                <?php 
                    echo "login.php";
                    
                ?>    
        ><button id="sing-in-up">Sign in/up</button></a>
    </div>
    
</nav>