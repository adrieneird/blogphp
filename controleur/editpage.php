<?php

if (isset($_POST['send'])) {
    $page = Page::loadFromId($_POST['id']);
    if ($page) {
        $page->setUrl($_POST['url']);
        $page->setTitre($_POST['titre']);
        $page->setContenu($_POST['contenu']);
        $page->saveUpdate();
    }
}

if (isset($_GET['page'])) {
    // requete pour récuperer le contenu à partir de l'URL
    // Récupération du résultat
    
    $page = Page::loadFromUrl(trim($_GET['page']));
    if ($page) {
        //require_once "vue/affichepage.php";
        $template = "vue/form_page.php";
    } else {
        $template = "vue/404.html";
    }
    require "vue/layout.php";
} else {
    $template = "vue/404.html";
    require "vue/layout.php";
}
