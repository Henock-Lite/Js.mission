<?php include "./config.php";


$page = $_GET["page"] ?? "Bibliothèque";
$pages = [
  "Bibliothèque" => "Page Bibliothèque",
];


if (!array_key_exists($page, $pages)) {
  $title = "Page introuvable";
  $page = "404";
} else {
  $title = $pages[$page];
}
include "./header.php";

?>

<body>
  <?php include "./nav.php" ?>
  <main>
    <section id="accueil" class="hero">
      <div class="container">
        <h2>Bienvenue dans notre bibliothèque</h2>
        <p>
          Découvrez notre vaste collection de livres, magazines et ressources
          numériques.
        </p>
        <a href="#catalogue" class="btn">Explorer le catalogue</a>
      </div>
    </section>

    <section class="user-gestion">
      <div class="center-title">
        <h2>Guide rapide</h2>
      </div>
      <div class="grid-cards" style="display:grid;grid-template-columns:repeat(auto-fit,minmax(250px,1fr));gap:20px;margin-top:30px;">


        <div>
          <h3>🔍 Rechercher un livre (accueil)</h3>
          <ol>
            <li>Utilisez la <strong>barre de recherche</strong> en bas de la page d’accueil.</li>
            <li>Entrez le <strong>titre</strong>, le <strong>nom de l'auteur</strong> ou un <strong>mot-clé</strong>.</li>
            <li>Validez pour voir les résultats correspondant à votre recherche.</li>
          </ol>
        </div>


        <div>
          <h3>📄 Consulter les résultats</h3>
          <ol>
            <li>Après une recherche, les livres trouvés s'affichent avec leur <strong>titre</strong> et <strong>auteur</strong>.</li>
            <li>Cliquez sur <strong>"Voir les détails"</strong> pour en savoir plus sur un livre.</li>
          </ol>
        </div>


        <div>
          <h3>📘 Voir les détails d’un livre</h3>
          <ol>
            <li>La page détails vous montre le <strong>titre</strong>, <strong>auteur</strong>, <strong>description</strong>, etc.</li>
            <li>Vous pouvez alors l'<strong>ajouter à votre liste de lecture</strong>.</li>
          </ol>
        </div>


        <div>
          <h3>➕ Ajouter un livre à ma liste</h3>
          <ol>
            <li>Sur la page de détails du livre, sélectionnez votre nom ou profil si nécessaire.</li>
            <li>Cliquez sur <strong>"Ajouter à la liste de lecture"</strong>.</li>
            <li>Vous serez redirigé vers votre liste contenant ce livre.</li>
          </ol>
        </div>


        <div>
          <h3>📚 Gérer ma liste de lecture</h3>
          <ol>
            <li>Accédez à la page <strong>"Ma liste de lecture"</strong> </li>
            <li>Vous y verrez tous les utilisateur et leur preferences de lecture quand vous le sectionner</li>
          </ol>
        </div>


        <div>
          <h3>🗑️ Supprimer un livre</h3>
          <ol>
            <li>Accédez à votre liste de lecture </li>
            <li>Cliquez sur <strong>"retirer"</strong> à côté du livre.</li>
          </ol>
        </div>
      </div>
      </div>
    </section>

    <section id="catalogue" class="catalogue">
      <div class="container">
        <h2>Rechercher un livre</h2>
        <form method="GET" action="./result.php">
          <div class="search-bar">
            <input type="text" placeholder="Rechercher un livre..." name="search" id="search" />
            <button type="submit"><i class="fas fa-search"></i></button>
          </div>
        </form>
      </div>
      </div>
    </section>

    <section id="contact" class="contact"></section>

  </main>
  <?php include "./footer.php" ?>
</body>
<script src="./app.js"></script>

</html>