<ul>
<?php
    foreach($pages as $rowpage) {
?>
<li>
    <a href="index.php?action=affiche_page&page=<?= $rowpage->getUrl() ?>"><?= $rowpage->getTitre() ?></a>
</li>
<?php
    }
?>
</ul>