<?php

session_start();

if (isset($_GET['action'])) {
    $action = $_GET['action'];
    
    if ($action === "affiche_formulaire") {
        if (!isset($_SESSION['id'])) {
            header("Location: https://adrienboeglin.sites.3wa.io/php1/blog/index.php?action=login");
            die();
        }
        require "controleur/form.php";
    }
    if ($action === "affiche_page") {
        require "controleur/affichepage.php";
    }
    if ($action === "login") {
        require "controleur/login.php";
    }
    if ($action === "subscribe") {
        require "controleur/subscribe.php";
    }
} else {
    // Page par défaut
    header("Location: https://adrienboeglin.sites.3wa.io/php1/blog/index.php?action=affiche_formulaire");
    die();
}