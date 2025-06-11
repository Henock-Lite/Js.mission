<?php

include "./config.php";


//4.1. Créez un script PHP pour mettre à jour l'année de publication du livre dont le titre est 
//"Vingt mille lieues sous les mers" pour la changer en 1870. Vous devez d’abord afficher les 
//données actuelles dans un formulaire et ajouter un bouton de mise à jour. Assurez-vous 
//que la mise à jour est effectuée correctement après clic sur le bouton correspondant. 


try {


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $newtitle = htmlspecialchars(trim($_POST["title"]) ?? "");

        if (empty($newtitle)) {
            echo "<script>alert('Le champs ne peux pas être vide ')</script>";
        } else {
            $sqlupdate = 'UPDATE livres SET titre=? WHERE id=7';
            $updatequery = $pdo->prepare($sqlupdate);
            $updatequery->bindParam(1, $newtitle, PDO::PARAM_STR);
            $updatequery->execute();
        }
    }

    //-------------------------------------------


    $sql = 'SELECT * FROM livres WHERE id=7';
    $result = $pdo->prepare($sql);
    $result->execute();
    $reqresult = $result->fetchAll();

    echo "<form method='POST' style='font-family: Arial; max-width: 600px;'>";
    echo "<h2 style='color: #333;'>📚 Livre</h2>";
    echo "<ul style='list-style-type: none; padding-left: 0;'>";

    foreach ($reqresult as $livre) {
        echo "<li style='margin-bottom: 16px; padding: 20px; border: 1px solid #ddd; border-radius: 5px;'>";

        foreach ($livre as $cle => $valeur) {
            if ($cle === 'id') {
                continue;
            }
            echo "<strong>" . htmlspecialchars(ucfirst($cle)) . ":</strong> " . htmlspecialchars($valeur) . "<br>";
        }

        echo "</li>";
    }

    echo "<input 
    type='text' 
    name='title' 
    placeholder=\"Nouveau Titre\" 
    style='
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        width: 250px;
        margin-bottom: 10px;
        font-size: 16px;
    '
>";


    echo "<div><input type='submit'style='
    background-color: #3498db;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    font-weight: bold;
    cursor: pointer;
    transition: background-color 0.3s;' value='Mettre à jour'></div>";

    echo "</ul>";
    echo "</form>";
} catch (Exception $e) {
    echo "Erreur de connexion" . $e->getMessage();
}
