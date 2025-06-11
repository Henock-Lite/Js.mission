<?php
include "./config.php";

//8.1. Créez un script PHP pour compter le nombre total de livres dans la table "livres". 
//Affichez ce nombre.

try {
    $sql = 'SELECT COUNT(*) as total FROM livres';
    $request = $pdo->prepare($sql);
    $request->execute();

    $result = $request->fetch(); 
    echo "Nombre total de livres : " . $result['total'];

} catch (Exception $e) {
    echo "Échec de la récupération : " . $e->getMessage();
}
