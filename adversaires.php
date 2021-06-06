<?php
require_once 'config/Mobile_Detect.php';
$detect = new Mobile_Detect;
include 'nav.php';
?>
<div class="container-fluid py-3" id="search">
  <div class="col d-flex align-items-center justify-content-center">
    <div class="d-flex align-items-center">
      <?php
      if ($detect->isMobile()) {
        echo '<svg id="loupe" class="mr-3" width="38" height="40" viewBox="0 0 27 28" fill="none" xmlns="http://www.w3.org/2000/svg">
          <circle cx="11" cy="11" r="10.5" stroke="#C4B998" stroke-opacity="0.9" />
          <path d="M18 19L26 27" stroke="#C4B998" stroke-opacity="0.9" />
          </svg>';
      } else {
        echo '<svg id="loupe" class="mr-3" width="19" height="20" viewBox="0 0 27 28" fill="none" xmlns="http://www.w3.org/2000/svg">
          <circle cx="11" cy="11" r="10.5" stroke="#C4B998" stroke-opacity="0.9" />
          <path d="M18 19L26 27" stroke="#C4B998" stroke-opacity="0.9" />
          </svg>';
      }
      ?>
      <input type="text" id="search-field" placeholder="Trouver un champion">
    </div>
  </div>
</div>
<section class="container mb-footer">

  <div class="d-flex justify-content-around titre-b">
    <div class="align-items-center d-none d-xl-flex">
      <img src="img/bg/ligne3.png" classe="ligne" id="ligne1" alt="">
    </div>
    <h1 class="color-txt">Sélectionnez le champion ennemi</h1>
    <div class="align-items-center d-none d-xl-flex">
      <img src="img/bg/ligne3.png" classe="ligne" id="ligne2" alt="">
    </div>
  </div>

  <p class=" text-center soustitre">Veuillez sélectionner le champion que vous allez affronter.</p>

  <div class="col-md-12">
    <div class="<?php if (!$detect->isMobile()) {
                  echo "row justify-content-around flew-wrap";
                } ?>">
      <?php

      $rqt = 'SELECT name, id FROM personnages';

      if (isset($_GET['M'])) {
        $rqt .= ' where id not like "' . $_GET['M'] . '"';
      }

      $rqt .= ' order by name';

      $querynames = $bdd->query($rqt);

      while ($names = $querynames->fetch()) {
        if ($detect->isMobile()) {
      ?>
          <div class="row advsearch align-items-center advmobile" data-nom="<?= $names['name']; ?>" id="<?= $names['id'] ?>"">
            <img src=" http://ddragon.leagueoflegends.com/cdn/img/champion/tiles/<?= $names['id']; ?>_0.jpg" width="200" alt="">
            <div class="d-flex justify-content-center advmobilename">
              <h2 class="color-txt"><?= $names['name']; ?></h2>
            </div>
          </div>
        <?php
        } else {
        ?>
          <div class="px-2 py-2 scale advsearch" data-nom="<?= $names['name']; ?>" id="<?= $names['id'] ?>">
            <?php
            if (isset($_GET['M'])) {
              echo "<a href='" . $urlaff2 . $_GET['M'] . "&E=" . $names['id'] . "'>
              <div class='position-relative'> <div class='filter position-absolute'></div><img src='http://ddragon.leagueoflegends.com/cdn/11.10.1/img/champion/" . $names['id'] . ".png' class='card-img' alt=''>
              </div></a>";
            } else {
              echo "<a href='" . $urlreverse . $names['id'] . "'>
                <div class='position-relative'><div class='filter position-absolute'></div><img src='http://ddragon.leagueoflegends.com/cdn/11.10.1/img/champion/" . $names['id'] . ".png' class='card-img' alt=''></div>
                </a>";
            }

            ?>
          </div>
      <?php
        }
      }
      ?>
      <div class="filling-empty-space-childs"></div>
      <div class="filling-empty-space-childs"></div>
      <div class="filling-empty-space-childs"></div>
      <div class="filling-empty-space-childs"></div>
      <div class="filling-empty-space-childs"></div>
      <div class="filling-empty-space-childs"></div>
      <div class="filling-empty-space-childs"></div>
    </div>
  </div>
</section>

<script>
  let search_fieldElt = document.getElementById('search-field');
  let advsearchElt = [...document.getElementsByClassName('advsearch')];

  search_fieldElt.addEventListener('input', function(e) {
    advsearchElt.forEach(element => {

      if (element.dataset.nom.toLowerCase().includes(search_fieldElt.value.toLowerCase())) {
        element.style.display = "block";
      } else {
        element.style.display = "none";
      }
    })
  })

  $(window).scroll(function() {
    if ($(window).scrollTop() >= 100) {
      $('body').addClass('scroll');
    } else {
      $('body').removeClass('scroll');
    }
  });
</script>

<?php
$querynames->closeCursor();
?>

<?php
include 'footer.php';
?>