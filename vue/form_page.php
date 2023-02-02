<form method="POST">
    <input type="text" name="url" <?php if (isset($page)) { ?>value="<?= $page->getUrl() ?>"<?php } ?> />
    <input type="text" name="titre" <?php if (isset($page)) { ?>value="<?= $page->getTitre() ?>"<?php } ?> />
    <textarea name="contenu"><?php if (isset($page)) { ?><?= $page->getContenu() ?><?php } ?></textarea>
    <?php if (isset($page)) { ?><input type="hidden" name="id" value="<?= $page->id ?>" /><?php } ?>
    <input type="submit" name="send" />
</form>
