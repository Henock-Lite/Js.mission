<?php
require "./config.php";

function clearInput($data)
{
    return htmlspecialchars(trim($data ?? ""));
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["delete"])) {
    $id_livre = clearInput($_POST["id_livre"] ?? '');
    $id_lecteur = clearInput($_POST["id_lecteur"] ?? '');

    if (!empty($id_livre) && !empty($id_lecteur)) {
        try {
            $sql = "DELETE FROM liste_lecture WHERE id_livre = ? AND id_lecteur = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$id_livre, $id_lecteur]);
            echo "<p style='color:green;'>Livre retiré de votre liste avec succès.</p>";
        } catch (Exception $e) {
            echo "<p style='color:red;'>Erreur lors de la suppression : " . $e->getMessage() . "</p>";
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["id_livre"])) {
    $id_livre = clearInput($_POST["id_livre"] ?? '');
    $id_lecteur = clearInput($_POST["users"] ?? '');

    if (!empty($id_livre) && !empty($id_lecteur)) {
        try {

            $checkSql = "SELECT id_livre FROM liste_lecture WHERE id_livre = ? AND id_lecteur = ?";
            $checkStmt = $pdo->prepare($checkSql);
            $checkStmt->execute([$id_livre, $id_lecteur]);

            if ($checkStmt->rowCount() === 0) {
                $insertSql = "INSERT INTO liste_lecture (id_livre, id_lecteur) VALUES (?, ?)";
                $insertStmt = $pdo->prepare($insertSql);
                $insertStmt->execute([$id_livre, $id_lecteur]);
                echo "<p style='color:green;'>Livre ajouté à votre liste avec succès.</p>";
            } else {
                echo "<p style='color:orange;'>Ce livre est déjà dans votre liste.</p>";
            }
        } catch (Exception $e) {
            echo "<p style='color:red;'>Erreur lors de l'ajout : " . $e->getMessage() . "</p>";
        }
    }
}

$id_lecteur = clearInput($_GET["lecteur"] ?? '');
?>

<?php include "./header.php"; ?>
<?php include "./nav.php"; ?>

<div class="wishlist-container">
    <style>
        .wishlist-container {
            max-width: 1000px;
            margin: 40px auto;
            padding: 30px;
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .btn-remove {
            background-color: #e74c3c;
            color: white;
            border: none;
            padding: 10px 16px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .btn-remove:hover {
            background-color: #c0392b;
            transform: scale(1.05);
        }

        .btn-remove:active {
            background-color: #a93226;
            transform: scale(0.97);
        }

        table {
            border-spacing: 20px;
        }
    </style>

    <h1>Ma liste de lecture</h1>

    <div class="user-selector">
        <form method="get" action="wishlist.php">
            <label for="lecteur">Sélectionnez un lecteur :</label>
            <select name="lecteur" id="lecteur" onchange="this.form.submit()" required>
                <option value="">-- Choisir un lecteur --</option>
                <?php
                try {
                    $sql = "SELECT id, CONCAT(nom, ' ', prenom) AS nom_complet FROM lecteurs";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute();
                    foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $lecteur) {
                        $selected = ($lecteur["id"] == $id_lecteur) ? "selected" : "";
                        echo "<option value='" . htmlspecialchars($lecteur["id"]) . "' $selected>" .
                            htmlspecialchars($lecteur["nom_complet"]) . "</option>";
                    }
                } catch (Exception $e) {
                    echo "<option disabled>Erreur lors du chargement des lecteurs</option>";
                }
                ?>
            </select>
        </form>
    </div>

    <?php if (!empty($id_lecteur)): ?>
        <?php
        try {
            $sql = "SELECT l.id as id_livre, l.titre, l.auteur, l.maison_edition 
                    FROM liste_lecture ll
                    JOIN livres l ON ll.id_livre = l.id
                    WHERE ll.id_lecteur = ?
                    ORDER BY l.titre";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$id_lecteur]);
            $livres = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo "<p style='color:red;'>Erreur : " . $e->getMessage() . "</p>";
            $livres = [];
        }
        ?>

        <?php if (count($livres) > 0): ?>
            <table class="wishlist-table">
                <thead>
                    <tr>
                        <th>Titre</th>
                        <th>Auteur</th>
                        <th>Éditeur</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($livres as $livre): ?>
                        <tr>
                            <td><?= htmlspecialchars($livre["titre"]) ?></td>
                            <td><?= htmlspecialchars($livre["auteur"]) ?></td>
                            <td><?= htmlspecialchars($livre["maison_edition"]) ?></td>
                            <td>
                                <form method="post" style="display:inline;">
                                    <input type="hidden" name="id_livre" value="<?= htmlspecialchars($livre["id_livre"]) ?>">
                                    <input type="hidden" name="id_lecteur" value="<?= htmlspecialchars($id_lecteur) ?>">
                                    <button type="submit" name="delete" class="btn-remove">Retirer</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <div class="empty-wishlist">
                <p>Votre liste de lecture est vide.</p>
            </div>
        <?php endif; ?>
    <?php else: ?>
        <div class="empty-wishlist">
            <p>Veuillez sélectionner un lecteur pour afficher sa liste de lecture.</p>
        </div>
    <?php endif; ?>
</div>
<script>
    const deleteButtons = document.querySelectorAll("button[name='delete']");
    deleteButtons.forEach((btn) => {
        btn.addEventListener("click", (e) => {
            const confirmed = confirm("Êtes-vous sûr de vouloir retirer ce livre ?");
            if (!confirmed) {
                e.preventDefault();
            }
        });
    });
</script>