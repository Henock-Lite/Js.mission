<?php
include "./config.php";

//6.1. Créez un script PHP pour sélectionner tous les livres dont l'année de publication est 
//postérieure à 2000. Affichez ces livres avec leurs titres et leurs années de publication. 

try {
    $sqlPublication = 'SELECT * FROM livres WHERE annee_publication > 2000';
    $requestPublication = $pdo->prepare($sqlPublication);
    $requestPublication->execute();

    $livres = $requestPublication->fetchAll();

    foreach ($livres as $livre) {
    
        echo  "Le titre du livre : ".$livre["titre"]."<br>";

        echo "année de publication : ". $livre["annee_publication"]."<br>";

    }
} catch (Exception $e) {
    echo "Échec de la récupération : " . $e->getMessage();
}
