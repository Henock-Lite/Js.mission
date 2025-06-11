<?php
include "./config.php";

try {
    $sql = "SELECT DISTINCT categories FROM livres";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();


    $categories = $stmt->fetchAll();

    echo "<ul>";
    foreach ($categories as $categorie) {
        echo "<li>" . htmlspecialchars($categorie['categories']) . "</li>";
    }
    echo "</ul>";

} catch (PDOException $e) {
    echo "Erreur lors de la récupération des catégories : " . $e->getMessage();
}
