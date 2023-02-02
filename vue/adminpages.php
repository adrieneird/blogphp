<form method="POST">
    <ul>
<?php
    foreach($pages as $rowpage) {
?>
<li>
    <a href="index.php?action=edit_page&page=<?= $rowpage->getUrl() ?>"><?= $rowpage->getTitre() ?></a>
    <button name="delete" value="<?= $rowpage->id ?>">X</button>
</li>
<?php
    }
?>
    </ul>
</form>