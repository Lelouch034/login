<!DOCTYPE html>
<html>
<head>
    <title>Ajouter un film</title>
</head>
<body>
    <h2>Formulaire d'ajout de film</h2>
    <form action="traitement.php" method="post">
        <label for="title">Titre :</label>
        <input type="text" name="title" id="title" required><br>

        <label for="director">Réalisateur :</label>
        <input type="text" name="director" id="director" required><br>

        <label for="release_date">Année de sortie :</label>
        <input type="text" name="release_date" id="release_date" required><br>

        <label for="description">Description :</label>
        <textarea name="description" id="description" required></textarea><br>

        <input type="submit" name="submit" value="Ajouter le film">
    </form>
</body>
</html>

<?php 

$title = $conn->real_escape_string($title);
$director = $conn->real_escape_string($director);
$release_date = $conn->real_escape_string($release_date);
$description = $conn->real_escape_string($description);


  // Requête SQL INSERT
  $sql = "INSERT INTO movies (title, director, release_date, description) VALUES ('$title', '$director', '$release_date', '$description')";

  if ($conn->query($sql) === TRUE) {
      echo "Le film a été ajouté avec succès.";
  } else {
      echo "Erreur lors de l'ajout du film : " . $conn->error;
  }
?>