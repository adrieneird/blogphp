<?php

if (isset($_GET['action'])) {
    $action = $_GET['action'];
    
    if ($action === "affiche_formulaire") {
        require "form.php";
    }
    if ($action === "affiche_page") {
        require "affichepage.php";
    }
} else {
    // Page par défaut
    require "form.php";
}


