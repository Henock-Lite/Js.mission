<?php
include_once "./config.php";

function clearinput($data)
{
    return  htmlspecialchars(trim($data ?? ""));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titre = clearinput($_POST["titre"]);
    $auteur = clearinput($_POST["auteur"]);
    $annee_publication = clearinput($_POST["annee_publication"]);
    $categorie = clearinput($_POST["categorie"]);
    $image = clearinput($_POST["image"]);

    if (!is_numeric($annee_publication)) {
        exit("Format Année Invalide");
    }

    if (empty($titre) || empty($auteur) || empty($annee_publication) || empty($categorie) || empty($image)) {
        exit;
    }
}

try {
    $req = 'INSERT INTO livres (titre,auteur,annee_publication,categories,image) VALUES(?,?,?,?,?)';
    $request = $pdo->prepare($req);
    $request->bindParam(1, $titre, PDO::PARAM_STR);
    $request->bindParam(2, $auteur, PDO::PARAM_STR);
    $request->bindParam(3, $annee_publication, PDO::PARAM_STR);
    $request->bindParam(4, $categorie, PDO::PARAM_STR);
    $request->bindParam(5, $image, PDO::PARAM_STR);
    $request->execute();

    echo "<script>alert('formulaire envoyée ✅')</script>";
} catch (Exception $e) {
    echo 'Erreur SQL :' . $e->getMessage();
    exit;
}
