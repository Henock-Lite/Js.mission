<?php
require "./config.php";

function clearInput($data)
{
    return htmlspecialchars(trim($data ?? ""));
}

$id_livre = clearInput($_GET["id"] ?? '');

if (empty($id_livre)) {
    echo "<p>ID invalide.</p>";
    exit;
}


try {
    $sql = "SELECT * FROM livres WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id_livre]);

    if ($stmt->rowCount() > 0) {
        $livre = $stmt->fetch(PDO::FETCH_ASSOC);
    } else {
        echo "<p>Livre introuvable.</p>";
        exit;
    }
} catch (Exception $e) {
    echo "<p>Erreur : " . $e->getMessage() . "</p>";
    exit;
}

// Traitement du formulaire POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id_lecteur = clearInput($_POST["users"] ?? '');

    if (empty($id_lecteur)) {
        echo "<p style='color:red;'>Veuillez sélectionner un utilisateur.</p>";
    } else {
        try {
            $insertSQL = "INSERT INTO liste_lecture (id_livre, id_lecteur) VALUES (?, ?)";
            $stmt = $pdo->prepare($insertSQL);
            $stmt->execute([$id_livre, $id_lecteur]);
            echo "<p style='color:green;'>Ajout réussi dans la liste de lecture !</p>";
        } catch (Exception $e) {
            echo "<p>Erreur d'insertion : " . $e->getMessage() . "</p>";
        }
    }
}
?>

<?php include "./header.php"; ?>
<?php include "./nav.php"; ?>

<div class="book-detail">
    <style>
        .book-detail {
            max-width: 800px;
            margin: 40px auto;
            padding: 30px;
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .book-detail h2 {
            margin-bottom: 20px;
            color: #333;
        }

        .book-detail p {
            margin-bottom: 10px;
            font-size: 16px;
            color: #555;
        }

        .btn-wishlist {
            display: inline-block;
            padding: 10px 20px;
            background-color: #ff4081;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn-wishlist:hover {
            background-color: #e73370;
        }
    </style>

    <h2><?= htmlspecialchars($livre["titre"]) ?></h2>
    <p><strong>Auteur :</strong> <?= htmlspecialchars($livre["auteur"]) ?></p>
    <p><strong>Description :</strong> <?= nl2br(htmlspecialchars($livre["description"])) ?></p>
    <p><strong>Maison d'édition :</strong> <?= htmlspecialchars($livre["maison_edition"]) ?></p>
    <p><strong>Exemplaires disponibles :</strong> <?= htmlspecialchars($livre["nombre_exemplaire"]) ?></p>

    <form method="post"  action="wishlist.php">
        <input type="hidden" name="id_livre" value="<?= htmlspecialchars($id_livre) ?>">

        <label for="users">Choisir un utilisateur</label>
        <select name="users" id="users" required>
            <option value="">-- Sélectionner un lecteur --</option>
            <?php
            try {
                $sql = "SELECT id, nom FROM lecteurs";
                $stmt = $pdo->prepare($sql);
                $stmt->execute();
                foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $lecteur) {
                    echo "<option value='" . htmlspecialchars($lecteur["id"]) . "'>" . htmlspecialchars($lecteur["nom"]) . "</option>";
                }
            } catch (Exception $e) {
                echo "<option disabled>Erreur lors du chargement des utilisateurs</option>";
            }
            ?>
        </select>

        <br><br>
        <input type="submit" class="btn-wishlist" value="Ajouter à la liste de lecture">
    </form>
</div>
