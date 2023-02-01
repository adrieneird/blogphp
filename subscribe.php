<?php

require_once "form_subscribe.php";
require_once "user.php";

// Traitement des données formulaires
if (isset($_POST['subscribe'])) {
    $form_subscribe = new FormSubscribe();
    $form_subscribe->process();
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
    include "vue/form_subscribe.html";
 } ?>
    </body>
</html>