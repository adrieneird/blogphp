<?php

require_once "classpage.php";

if (isset($_GET['page'])) {
    // requete pour récuperer le contenu à partir de l'URL
    // Récupération du résultat
    $page = Page::loadFromUrl(trim($_GET['page']));
    if ($page) {
?>
<h1><?= $page->getTitre() ?></h1>
<p><?= $page->getContenu() ?></p>
<?php
    } else {
        echo "404 not found";
    }
} else {
    echo "404 not found";
}
?>
