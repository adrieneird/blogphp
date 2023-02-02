<?php
    if (isset($_POST['delete'])) {
        Page::deleteById($_POST['delete']);
    }

    // Répertorie les différentes pages (de la BDD) soit sous forme de liste, soit sous forme de tableau
    $pages = Page::loadPages();
    
    // Affichage de la vue
    $template = "adminpages.php";
    require "vue/layout.php";