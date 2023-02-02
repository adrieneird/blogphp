<?php

if (isset($_GET['page'])) {
    // requete pour récuperer le contenu à partir de l'URL
    // Récupération du résultat
    
    $page = Page::loadFromUrl(trim($_GET['page']));
    if ($page) {
        //require_once "vue/affichepage.php";
        $template = "vue/affichepage.php";
    } else {
        $template = "vue/404.html";
    }
    require "vue/layout.php";
} else {
    $template = "vue/404.html";
    require "vue/layout.php";
}
