<?php

if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
    $urldeb = "https";
} else {
    $urldeb = "http";
}

$urldeb .= "://" . $_SERVER['HTTP_HOST'];
$urlcourante = $urldeb . $_SERVER['REQUEST_URI'];

$enligne = '';

if ($_SERVER['HTTP_HOST'] == 'localhost') {
    // url de l'accueil
    $urlindex = $urldeb . "/matchups/index.php";
    // url pour reverse
    $urlreverse = $urldeb . "/matchups/reverse.php?E=";
    $urladv = $urldeb . "/matchups/adversaires.php";
    // url pour matchups
    $urlMU = $urldeb . "/matchups/matchups.php";
    $urladv2 = $urldeb . "/matchups/adversaires.php?M=";
    $urlaff = $urldeb . "/matchups/affichage.php";
    $urlaff2 = $urldeb . "/matchups/affichage.php?M=";
    // url des guides
    $urlguides = $urldeb . "/matchups/guides.php";
    // url contact
    $urlcontact = $urldeb . "/matchups/contact.php";
    $urlmentions = $urldeb . "/matchups/mentions-legales.php";
} else {
    // url de l'accueil
    $urlindex = $urldeb;
    // url pour reverse
    $urlreverse = $urldeb . "/reverse?E=";
    $urladv = $urldeb . "/adversaires";
    // url pour matchups
    $urlMU = $urldeb . "/matchups";
    $urladv2 = $urldeb . "/adversaires?M=";
    $urlaff = $urldeb . "/affichage";
    $urlaff2 = $urldeb . "/affichage?M=";
    // url des guides
    $urlguides = $urldeb . "/guides";
    // url contact
    $urlcontact = $urldeb . "/contact";
    $urlmentions = $urldeb . "/mentions-legales";
}
