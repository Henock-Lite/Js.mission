<?php
session_start();

$nom = $_SESSION["nom"] ?? "Nom non fourni";
$email = $_SESSION["email"] ?? "Email non fourni";


?>

<h2>Formulaire reçu</h2>
<p>Nom : <?= htmlspecialchars($nom) ?></p>
<p>Email : <?= htmlspecialchars($email) ?></p>

<?php
session_unset();
session_destroy();
?>