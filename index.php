<?php

session_start();

if (isset($_GET['action'])) {
    $action = $_GET['action'];
    
    if ($action === "affiche_formulaire") {
        if (!isset($_SESSION['id'])) {
            header("Location: https://adrienboeglin.sites.3wa.io/php1/blog/login");
            die();
        }
        require "form.php";
    }
    if ($action === "affiche_page") {
        require "affichepage.php";
    }
    if ($action === "login") {
        require "login.php";
    }
    if ($action === "subscribe") {
        require "subscribe.php";
    }
} else {
    // Page par défaut
    header("Location: https://adrienboeglin.sites.3wa.io/php1/blog/affiche_formulaire");
    die();
}