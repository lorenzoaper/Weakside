<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <link href="Typographies/beaufortforlol-bold.otf, Typographies/beaufortforlol-regular.otf, Typographies/beaufortforlol-light.otf " rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="shortcut icon" type="image/x-icon" href="img/logo/weaksidefav.ico" />
    <title>Weakside</title>
</head>

<body>

    <?php

    include 'statut.php';

    include '../settings.php';

    if ($urlcourante == $urladv || strpos($urlcourante, $urladv2) !== false) {
        echo "<style> #menu-top {margin-bottom:0;}</style>";
    } else if ($urlcourante == $urlindex || $urlcourante == $urlindex . "/") {
        echo "<style> #menu-top {margin-bottom:0;} #header{padding-right:0; padding-left:0;}</style>";
    }

    ?>
    <div class="container-fluid" id="menu-top">
        <div class="col">
            <nav class="navbar navbar-expand-lg ">
                <a class="navbar-brand mr-5" href="<?= $urlindex; ?>">
                    <img src="img/logo/logo-01.png" width="150" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"><svg width="40" height="40" viewBox="0 0 24 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 1H23H1ZM1 9H23H1ZM1 17H23Z" fill="#FCF18A" />
                            <path d="M1 17H23M1 1H23H1ZM1 9H23H1Z" stroke="#FCF18A" stroke-opacity="0.5" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" />
                        </svg></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                        <li class="nav-item">
                            <a class=" nav-link px-3 <?php if ($urlcourante == $urlindex) {
                                                            echo "active";
                                                        } ?>" href="<?= $urlindex; ?>">Accueil</a>
                        </li>
                        <li class="nav-item">
                            <a class=" nav-link px-3 <?php if ($urlcourante == $urlMU || strpos($urlcourante, $urladv2) !== false || strpos($urlcourante, $urlaff) !== false) {
                                                            echo "active";
                                                        } ?>" href="<?= $urlMU; ?>">Matchups</a>
                        </li>
                        <li class="nav-item">
                            <a class=" nav-link px-3 <?php if ($urlcourante == $urladv || strpos($urlcourante, $urlreverse) !== false) {
                                                            echo "active";
                                                        } ?>" href="<?= $urladv; ?>">Reverse</a>
                        </li>
                        <li class="nav-item">
                            <a class=" nav-link px-3 <?php if ($urlcourante == $urlguides) {
                                                            echo "active";
                                                        } ?>" href="<?= $urlguides; ?>">Guides</a>
                        </li>
                        <li class="nav-item">
                            <a class=" nav-link px-3 <?php if ($urlcourante == $urlcontact) {
                                                            echo "active";
                                                        } ?>" href="<?= $urlcontact; ?>">Contact</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>

    <?php

    /*try {
        $bdd = new PDO('mysql:host=localhost;dbname=matchups;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    } catch (\Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }*/

    if ($_SERVER['HTTP_HOST'] == 'localhost') {
        try {
            $bdd = new PDO('mysql:host=localhost;dbname=matchups;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        } catch (\Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    } else {
        try {
            $bdd = new PDO('mysql:host=' . $host . ';dbname=' . $database . ';charset=utf8', $login, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        } catch (\Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
    ?>