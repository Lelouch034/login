<?php
    include_once 'header.php';
?>
      
    <div class="signup-form">
        <h2>Sign Up</h2>
        <form  action="includes/signup.inc.php" method="post">
            <input type="text" name="name" placeholder="Your name">
            <input type="email" name="email" placeholder="Email">
            <input type="text" name="uid" placeholder="Username">
            <input type="password" name="pwd" placeholder="Password">
            <input type="password" name="pwdRepeat" placeholder="Repeat Password">
            <button type="submit" name="submit">Sign up</button>
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