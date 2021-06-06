    <?php
    include 'nav.php';
    ?>

    <section class="container mb-footer">

        <?php

        $rqt = $bdd->query('SELECT name FROM personnages
            WHERE id = \'' . $_GET['E'] . '\'');

        $rsl = $rqt->fetch();

        ?>
        <div class="d-flex justify-content-around titre-b">
            <div class="align-items-center d-none d-xl-flex">
                <img src="img/bg/ligne3.png" classe="ligne" id="ligne1" alt="">
            </div>
            <h1 class="text-center color-txt">Les matchups pour <?= $rsl['name'] ?></h1>
            <div class="align-items-center d-none d-xl-flex">
                <img src="img/bg/ligne3.png" classe="ligne" id="ligne2" alt="">
            </div>
        </div>
        <p class=" text-center soustitre">Les matchups sont classés par ordre de difficultés afin de vous aiguiller dans votre choix.</p>
        <div class="col">
            <div class="row justify-content-center">
                <?php

                $querynames = $bdd->query('SELECT os.*, p.*, p2.name as enemy_name, p2.id as enemy_id, couleur, level, di.id as difid FROM other_stuff os
                  INNER JOIN personnages p on p.id = os.id_my_character
                  INNER JOIN personnages p2 on p2.id = os.id_character
                  INNER JOIN difficulty_index di on di.id = os.difficulty
                  WHERE os.id_character = \'' . $_GET['E'] . '\' AND os.id_my_character IN ("Akali", "Camille", "Fiora", "Irelia", "Quinn", "Riven") ORDER BY di.id ;');

                while ($names = $querynames->fetch()) {

                ?>
                    <div class="scale2 px-2 py-2">
                        <div class="iconchamp card-img" <?php if (isset($_GET['E'])) {
                                                            if ($names['enemy_name'] == $names['name']) {
                                                                echo "style='display: none;'";
                                                            }
                                                        } ?>>
                            <?php
                            echo "<style>.dif" . $names['difid'] . "{background-color: " . $names['couleur'] . ";}</style>";
                            echo "<a href='" . $urlaff2 . $names['id_my_character'] . "&E=" . $_GET['E'] . "'>
                            <div class='position-relative'><div class='filter position-absolute'></div><div><img src ='http://ddragon.leagueoflegends.com/cdn/img/champion/tiles/" . $names['id'] . "_0.jpg' alt=''><div class='difficulté dif" . $names['difid'] . " mx-auto'></div></div></div>
                            </a>";
                            ?>
                        </div>

                        <h3 class="text-center color-txt"><?= $names['level'] ?></h3>
                    </div>
                <?php
                }
                ?>
                <div id="filling-empty-space-child-reverse"></div>
            </div>
        </div>
    </section>

    <?php
    include 'footer.php';
    ?>