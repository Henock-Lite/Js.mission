<?php
function isPageActive($pageName)
{
    $current = isset($_GET['page']) ? strtolower($_GET['page']) : 'Bibliothèque';
    return $current === strtolower($pageName);
}
?>

<section class="header">
    <div class="container">
        <h1>Bibliothèque Municipale</h1>
        <nav>
            <ul>
                <li><a href="index.php?page=Bibliothèque" data-page="Bibliothèque"  <?= isPageActive('Bibliothèque') ? 'active' : '' ?>>Retour à la bibliothèque</a></li>
            </ul>
        </nav>
    </div>
</section>