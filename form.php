<?php
    require_once "functions.php";
    require_once "classpage.php";

    if (isset($_POST['send'])) {
        $page = new Page();
        $page->setUrl(sanitizeText("url"));
        $page->setTitre(sanitizeText("titre"));
        $page->setContenu(sanitizeText("contenu"));
        $page->saveNew();
    }
    
    $pages = Page::loadPages();
?>

<nav>
<?php
    foreach($pages as $rowpage) {
?>
<a href="index.php?page=<?= $rowpage->getUrl() ?>"><?= $rowpage->getTitre() ?></a>
<?php
    }
?>
</nav>

<form method="POST">
    <input type="text" name="url" />
    <input type="text" name="titre" />
    <textarea name="contenu"></textarea>
    <input type="submit" name="send" />
</form>