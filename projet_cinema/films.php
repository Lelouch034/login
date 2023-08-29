

<?php
    include_once 'header.php';
?>

<?php
require_once('includes/dbh.inc.php');

$sql = "SELECT * FROM movie";

// Exécutez la requête SQL
$result = mysqli_query($conn, $sql);

// Vérifiez s'il y a des résultats
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "ID: " . $row["id"] . "<br>";
        echo "Titre: " . $row["title"] . "<br>";
        // ... (affichez d'autres colonnes)

        if (!empty($row["image_path"])) {
            echo '<a href="description.php?id=' . $row["id"] . '">';
            echo '<img src="' . $row["image_path"] . '" alt="' . $row["title"] . '"><br>';
            echo '</a>';
        } else {
            echo 'Aucune affiche disponible' . "<br >" . $row["title"] . '"><br>';
        }
    }
} else {
    echo "Aucun résultat trouvé dans la table 'movie'.";
}
?>









<script>
        const menuHamburger = document.querySelector(".menu-hamburger")
        const navLinks = document.querySelector(".nav-links")
 
        menuHamburger.addEventListener('click',()=>{
            navLinks.classList.toggle('mobile-menu')
        })
    </script>









