<?php
    include_once 'header.php';
?>
 



<?php

require_once('includes/dbh.inc.php');


if (isset($_SESSION['usersuid'])) {
    $utilisateur_id = $_SESSION['usersuid'];
   
    // Modifie la requête SQL pour récupérer les informations de l'utilisateur connecté
    $sql = "SELECT * FROM users WHERE usersUid = '$utilisateur_id'";
    
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "<table>";
        echo "<tr><th>ID</th><th>Nom</th><th>Email</th></tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row["usersName"] . "</td>";
            echo "<td>" . $row["usersEmail"] . "</td>";
            echo "<td>" . $row["usersUid"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "Aucun résultat trouvé pour l'utilisateur connecté.";
    }
} else {
    // Si l'utilisateur n'est pas connecté
    header("Location: /projet_cinema/login.php");
    exit();
}

?>








<script>
        const menuHamburger = document.querySelector(".menu-hamburger")
        const navLinks = document.querySelector(".nav-links")
 
        menuHamburger.addEventListener('click',()=>{
            navLinks.classList.toggle('mobile-menu')
        })
    </script>




