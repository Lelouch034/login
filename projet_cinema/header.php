<?php
    session_start();    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200&family=VT323&display=swap" rel="stylesheet">
    <title>Cinema</title>
</head>
<body>
    <div class="sec1">
        <nav class="navbar">
            <a href="index.php" class="logo">Guān dēng</a>
            <div class="nav-links">
                <ul>
                    <li><a href="index.php">HOME</a></li>
                    <li><a href="films.php">TOUS LES FILMS</a></li>
                    <?php
                        if(isset($_SESSION["usersuid"])) {
                            echo '<li><a href="profil.php">Profile</a></li>';
                            echo '<li><a href="includes/logout.inc.php">Log out</a></li>';
                        }else {
                            echo '<li><a href="login.php"">LOG-IN</a></li>';
                            echo '<li><a href="signup.php">SIGNUP</a></li>';
                        }
                    ?>
                </ul>
            </div>
            <img src="images/menu-btn.png" class="menu-hamburger" alt="">
        </nav>
    </div>

