<?php
require "./config.php";

function clearInput($data)
{
    return htmlspecialchars(trim($data ?? ""));
}

$search = clearInput($_GET["search"]);
?>
      <?php include "./header.php" ?>

      <?php include "./nav.php" ?>

    <h2>Résultats pour : "<?= htmlspecialchars($search) ?>"</h2>
    <div class="books-container">
        <?php
        if (!empty($search)) {
            try {
                $sql = "SELECT id, titre, auteur, description, maison_edition, nombre_exemplaire 
                FROM livres 
                WHERE titre LIKE ? OR auteur LIKE ?";
                $request = $pdo->prepare($sql);
                $searchWildcard = "%" . $search . "%";
                $request->execute([$searchWildcard, $searchWildcard]);

                if ($request->rowCount() > 0) {
                    while ($row = $request->fetch()) {

                        echo "<div class='card-parent books-item'>";
                        echo "<div class='card-book'>";
                        echo "<h3>" . htmlspecialchars($row["titre"]) . "</h3>";
                        echo "</div>"; 
                        echo "<div class='card-content'>";
                        echo "<p>Auteur : " . htmlspecialchars($row["auteur"]) . "</p>";
                        echo "</div>";
                        echo "<a href='details.php?id=" . urlencode($row["id"]) . "' class='btn-voir'>Voir</a>";
                        echo "</div>"; 
                    }
                } else {
                    echo "<p>Aucun résultat trouvé pour « " . $search . " ».</p>";
                }
            } catch (Exception $e) {
                echo "<p>Erreur dans la recherche : " . $e->getMessage() . "</p>";
            }
        }
        ?>
    </div>
</body>


</html>