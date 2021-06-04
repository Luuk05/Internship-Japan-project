<link rel="stylesheet" href="css/nav_bar_style.css">
<nav>
    <ul>
        <!-- <img src="images/internshiplogo.png" alt="Intership Japan"> -->
        <li><a href="">For Employers</a></li>
        <li><a href="">About us</a></li>
        <li><a href="">F.A.Q.</a></li>
    </ul>
    <!-- <a href = ""><button id="logout-button">Logout</button></a> -->
    <a href= 
            <?php 
                if (isset($_SESSION["username"])) {
                    echo "profile_page.php";
                } else {
                    echo "login.php";
                }
            ?>    
    ><button>Sign in/up</button></a>
</nav>