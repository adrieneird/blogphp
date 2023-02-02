<?php

// Autoloader
spl_autoload_register(function ($name) {
    $file = "class/".strtolower($name).".php";
    
    if (file_exists($file)) {
        require_once $file;
    }
});

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
    if ($action === "admin_pages") {
        /*if (!isset($_SESSION['id'])) {
            header("Location: https://adrienboeglin.sites.3wa.io/php1/blog/index.php?action=login");
            die();
        }*/
        require "controleur/adminpages.php";
    }
    if ($action === "edit_page") {
        require "controleur/editpage.php";
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