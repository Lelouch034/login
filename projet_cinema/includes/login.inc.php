<?php

if (isset($_POST["submit"])) {
    $username = $_POST["uid"];
    $pwd = $_POST["pwd"];

    require_once 'dbh.inc.php'; // Assure-toi que tu as une connexion à la base de données ici.
    require_once 'function.inc.php';

    if (emptyInputLogin($username, $pwd) !== false) {
        header("Location: /projet_cinema/login.php?error=imptyinput");
        exit(); // Quitte le script si les champs sont vides.
    }

    // Vérifie les informations de connexion de l'utilisateur
    $id_de_l_utilisateur = loginUser($conn, $username, $pwd);

    if ($id_de_l_utilisateur === false) {
        header("Location: /projet_cinema/login.php?error=wronglogin");
        exit(); // Quitte le script si les informations de connexion sont incorrectes.
    }

    // Si les informations de connexion sont correctes, alors :
    session_start(); // Démarre la session
    $_SESSION['utilisateur_id'] = $id_de_l_utilisateur; // Crée une session pour l'utilisateur connecté
    header("Location: /projet_cinema/index.php"); // Redirige vers la page d'accueil après la connexion
    exit();
} else {
    header("Location: /projet_cinema/login.php?error=invalidUsername");
    exit();
}
