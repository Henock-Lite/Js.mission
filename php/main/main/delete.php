<?php

include "./config.php";

//5.1. Écrivez un script PHP pour supprimer tous les livres de la catégorie "Romans 
//historiques" de la table "livres". Assurez-vous que les livres sont supprimés de manière 
//appropriée.

try {
    $sqldelete='DELETE FROM livres WHERE categories LIKE "%roman historique%"';
    $request=$pdo->prepare($sqldelete);
    $request->execute();
    echo "LEs roman historique ont été supprimer avec succès✅";
    
} catch (Exception $e) {
    echo "Echec de suppresion".$e->getMessage();
}