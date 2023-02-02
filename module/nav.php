<?php
    $pages = Page::loadPages();
?>
<nav>
<?php
    foreach($pages as $rowpage) {
?>
<a href="index.php?action=affiche_page&page=<?= $rowpage->getUrl() ?>"><?= $rowpage->getTitre() ?></a>
<?php
    }
?>
</nav>