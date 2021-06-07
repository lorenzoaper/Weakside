<!-- Navigation -->
<?php
include 'nav.php';

$rqt = 'SELECT os.*, p.*, p2.id as my_character_id, p2.name as my_character_name, p2.cooldown as my_cooldown, couleur FROM other_stuff os 
INNER JOIN personnages p ON p.id = os.id_character 
INNER JOIN personnages p2 ON p2.id = os.id_my_character 
INNER JOIN difficulty_index di ON di.id = os.difficulty
WHERE os.id_my_character = :myId AND os.id_character = :otherId';

$statement = $bdd->prepare($rqt);
$statement->execute(array(":myId" => $_GET['M'], ":otherId" => $_GET['E']));
$donnees = $statement->fetch();
?>

<div class="container">
    <div class="row">
        <!-- Card champion joué -->
        <div class="col-4 mt-10">
            <div>
                <h2 class="color-txt mb-4 text-center champName"><?= $donnees['my_character_name'] ?></h2>
                <?php echo "<img src='http://ddragon.leagueoflegends.com/cdn/img/champion/loading/" . $donnees['my_character_id'] . "_0.jpg' class='card-img border-img' alt='...'>" ?>
                <div class="card-body">
                    <p class="card-text color-txt text-center"><?= $donnees['my_cooldown']; ?></p>
                </div>
            </div>
        </div>

        <!-- Versus central & difficulté  -->
        <div class="col-4 mt-10 d-flex align-items-center justify-content-center">
            <div>
                <h1 class="versus color-txt text-center my-auto mx-auto">VS</h1>
                <?php echo "<style>.difficulté{background-color: " . $donnees['couleur'] . ";}</style>" ?>
                <div class="difficulté mx-auto"></div>
            </div>
        </div>

        <!-- Card champion adverse -->
        <div class="col-4 mt-10">
            <div>
                <h2 class="color-txt mb-4 text-center champName"><?= $donnees['name'] ?></h2>
                <?php echo "<img src='http://ddragon.leagueoflegends.com/cdn/img/champion/loading/" . $donnees['id'] . "_0.jpg' class='card-img border-img' alt='...'>" ?>
                <div class="card-body">
                    <p class="card-text color-txt text-center"><?= $donnees['cooldown']; ?></p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="col" id="build">
        <div class="d-flex">
            <?php echo "<div class='runesbox'><img src='img/runes/" . $donnees['my_character_name'] . "/" . $donnees['runes'] . ".png' class='runes' alt='...'></div>";
            echo "<div class='itemsbox d-flex justify-content-center'><div><img src='img/items/" . $donnees['my_character_name'] . "/" . $donnees['item_path'] . ".png' class='items'></div></div>"; ?>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="col-12  justify-content-center mx-auto">
        <img class=" filetElt" src="img/filet.png" alt="">
    </div>
</div>

<div class="container mb-footer">
    <div class="row justify-content-center">

        <?php
        if ($donnees['wave'] !== null && $donnees['teamfight_split'] !== null) { ?>
            <div class="col-xl-4 col-8 col-txt pr-4">
                <h2 class="color-txt text-center">Tips</h2>
                <p><?= $donnees['tips']; ?></p>
            </div>

            <div class="col-xl-4 col-8 col-txt px-2">
                <h2 class="color-txt text-center">Wave management</h2>
                <p><?= $donnees['wave']; ?></p>
            </div>

            <div class="col-xl-4 col-8 col-txt pl-4">
                <h2 class="color-txt text-center">Teamfight / Split push</h2>
                <p><?= $donnees['teamfight_split']; ?></p>
            </div>
        <?php
        }

        if ($donnees['teamfight_split'] == null && $donnees['wave'] == null && $donnees['parry'] == null) { ?>
            <div class="container-sm">
                <div class="col-8 col-txt mx-auto">
                    <h2 class="color-txt text-center"> Tips</h2>
                    <p><?= $donnees['tips']; ?></p>
                </div>
            </div>
        <?php
        }

        if ($donnees['parry'] !== null) { ?>
            <div class="col-8 col-xl-6">
                <h2 class="color-txt text-center">Spells à parry</h2>
                <div class="d-flex justify-content-center" id="parryspell">
                    <?= $donnees['parry']; ?>
                </div>
            </div>

            <div class="col-8 col-xl-6">
                <h2 class="color-txt text-center">Tips</h2>
                <p><?= $donnees['tips']; ?></p>
            </div>
        <?php
        }

        ?>
    </div>
</div>

<?php
$statement->closeCursor();
?>

<?php
include 'footer.php';
?>