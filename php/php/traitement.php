<?php
include "./config.php";
session_start();

function clearinput($data)
{
    return htmlspecialchars(trim($data ?? ""));
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nom = clearinput($_POST["nom"]);
    $email = clearinput($_POST["email"]);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("location:index.html");
        exit;
    }

    if (empty($nom) || empty($email)) {
        header("location:index.html");
        exit;
    }

    try {
        $sql = "INSERT INTO contact(nom,email) VALUES(:nom ,:email)";
        $stm = $pdo->prepare($sql);

        $stm->execute([
            ":nom" => $nom,
            ":email" => $email
        ]);
         $_SESSION["nom"] = $nom;
        $_SESSION["email"] = $email;
        
        header("location:acces.php");
    } catch (Exception $e) {
        die("Erreur SQL : " . $e->getMessage());
    }
} else {
    header("location:index.html");
    exit;
}
