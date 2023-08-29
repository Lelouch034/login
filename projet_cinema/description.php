<?php
    include_once 'header.php';
?>
 
<?php
// Inclure le fichier de connexion à la base de données
require_once('includes/dbh.inc.php');

// Récupérer l'identifiant du film depuis l'URL
if (isset($_GET['id'])) {
    $film_id = $_GET['id'];
} else {
    die("Identifiant de film non spécifié dans l'URL.");
}

// Requête SQL pour récupérer les détails du film
$sql = "SELECT * FROM movie WHERE id = $film_id";

// Exécuter la requête SQL
$result = mysqli_query($conn, $sql);

// Vérifier s'il y a des résultats
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    // Afficher les détails du film
    echo "<h1>" . $row["title"] . "</h1>";
    echo '<img src="' . $row["image_path"] . '" alt="' . $row["title"] . '"><br>';
    echo "<p>Réalisateur : " . $row["director"] . "</p>";
    echo "<p>Année de sortie : " . $row["release_date"] . "</p>";
    echo "<p>Description : " . $row["description"] . "</p>";
    // ... (affichez d'autres colonn)
} else {
    echo "Aucun résultat trouvé pour ce film.";
}

// Fermer la connexion à la base de données
mysqli_close($conn);
?>







<script>
        const menuHamburger = document.querySelector(".menu-hamburger")
        const navLinks = document.querySelector(".nav-links")
 
        menuHamburger.addEventListener('click',()=>{
            navLinks.classList.toggle('mobile-menu')
        })
    </script>




