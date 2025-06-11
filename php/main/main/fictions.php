<?php
include_once "./config.php";

//3.1. Créez un script PHP qui se connecte à la base de données "bibliotheque_db" et 
//sélectionne tous les livres de la catégorie "Science-fiction". Affichez les résultats dans une 
//liste. Afficher ici simplement les noms des fichiers images

try {
    $sql = "SELECT * FROM livres WHERE categories LIKE '%science-fiction%'";
    $reqSelect = $pdo->prepare($sql);
    $reqSelect->execute();
    $data = $reqSelect->fetchAll();
    echo "<pre>";
    foreach ($data as $data) {
        echo "<br>";
        print_r($data);
        echo "<br> les images : ";
        echo $data["image"];
    }
    echo "</pre>";
} catch (Exception $e) {
    echo  "Erreur d'affichage" . $e->getMessage();
}
