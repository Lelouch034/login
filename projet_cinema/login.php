<?php
    include_once 'header.php';
?>
      
    <div class="signup-form">
        <h2>Log in</h2>
        <form  action="includes/login.inc.php" method="post">
            <input type="text" name="uid" placeholder="Username/Email">
            <input type="password" name="pwd" placeholder="Password">
            <button type="submit" name="submit">Log in</button>
        </form>
    </div>

<?php
    include_once 'footer.php';
?>
















<script>
        const menuHamburger = document.querySelector(".menu-hamburger")
        const navLinks = document.querySelector(".nav-links")
 
        menuHamburger.addEventListener('click',()=>{
            navLinks.classList.toggle('mobile-menu')
        })
    </script>