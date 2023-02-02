<?php

// Traitement des données formulaires
if (isset($_POST['login'])) {
    $form_login = new FormLogin();
    $form_login->process();
}

// Connecté ou non ?
$nickname = "";
if (isset($_SESSION['id'])) {
    // Récupération du nickname de l'user selon son ID
    $user = new User($_SESSION['id']);
    $nickname = $user->loadNickname();
}

?>
<html>
    <body>
<?php
    //On est connecté, on affiche bonjour
    if (isset($_SESSION['id'])) { 
?>
    Bonjour <?= $nickname ?> !
<?php 
    } else {
        // On n'est pas connecté, on affiche le formulaire
        $template = "vue/form_login.html";
        require "vue/layout.php";
    }
?>
    </body>
</html>