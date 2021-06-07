  <?php
  include 'nav.php';
  ?>
  <section class="container">
    <div class="d-flex justify-content-around titre-b">
      <div class="align-items-center d-none d-xl-flex">
        <img src="img/bg/ligne3.png" classe="ligne" id="ligne1" alt="">
      </div>
      <h1 class="text-center color-txt">Sélectionnez votre champion</h1>
      <div class="align-items-center d-none d-xl-flex">
        <img src="img/bg/ligne3.png" classe="ligne" id="ligne2" alt="">
      </div>
    </div>
    <p class=" text-center soustitre">Veuillez sélectionner le champion que vous souhaitez jouer.</p>
    <div class="col">
      <div class="row justify-content-center">
        <?php

        $rqt = $bdd->query('SELECT p.* FROM personnages p
        WHERE p.id IN ("Akali", "Camille", "Fiora", "Irelia", "Quinn", "Riven");');

        while ($perso = $rqt->fetch()) {

        ?>
          <div class="px-2 py-2 <?php if ($perso['state'] == 1) {
                                  echo 'scale';
                                } else {
                                  echo 'indispo';
                                } ?>">
            <?php
            if ($perso['state'] == 1) {
              echo "<a href='" . $urladv2 . $perso['id'] . "'>
              <div class='position-relative'><div class='filter position-absolute'></div><img src='http://ddragon.leagueoflegends.com/cdn/11.10.1/img/champion/" . $perso['id'] . ".png' class='card-img' alt=''></div>
              </a>";
            } else {
              echo "<div class='position-relative'><div class='position-absolute'></div><img src='http://ddragon.leagueoflegends.com/cdn/11.10.1/img/champion/" . $perso['id'] . ".png' class='card-img' alt=''></div>";
            }
            ?>
          </div>
        <?php
        }
        ?>

      </div>
    </div>
  </section>

  <?php
  $rqt->closeCursor();

  include 'footer.php';
  ?>