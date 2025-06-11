<?php

include "./config.php";

//9.1. Écrivez un script PHP pour sélectionner les titres des 5 premiers livres de la table "livres" 
//par ordre alphabétique. Affichez ces titres dans une liste.

try {
    $sql = "SELECT titre FROM livres ORDER BY titre ASC LIMIT 5";
    $request = $pdo->prepare($sql);
    $request->execute();

    $titres = $request->fetchAll();

    echo "<ul>";
    foreach ($titres as $livre) {
        echo "<li>" . htmlspecialchars($livre['titre']) . "</li>";
    }
    echo "</ul>";

} catch (Exception $e) {
    echo "Erreur lors de la récupération des titres : " . $e->getMessage();
}
