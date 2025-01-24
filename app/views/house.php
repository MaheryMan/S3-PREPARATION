<?php

$status = isset($_GET['status']) ? $_GET['status'] : null;

if ($status == 'available') { ?>
  <script>
    window.alert("L'habitation est disponible.")
  </script>
<?php } elseif ($status == 'unavailable') { ?>
  <script>
    window.alert("L'habitation n'est pas disponible pour les dates sélectionnées.")
  </script>
<?php } elseif ($status == 'reserved') { ?>
  <script>
    window.alert("Votre réservation a été confirmée avec succès.")
  </script>

<?php } elseif ($status == 'error') { ?>
  <script>
    window.alert("Une erreur s'est produite lors de la réservation. Veuillez réessayer.")
  </script>

<?php } ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Stay B&B</title>
  <link rel="icon" href="<?= BASE_URL ?>/public/assets/images/templates/logo.png" />
  <link rel="stylesheet" href="<?= BASE_URL ?>/public/assets/css/styles.css" />
  <link rel="stylesheet" href="<?= BASE_URL ?>/public/assets/css/themify-icons.css" />
  <!-- Themify Icons -->
  <link rel="stylesheet" href="<?= BASE_URL ?>/public/assets/css/themify-icons.css">
  <!-- Flat Icon -->
  <link rel="stylesheet" href="<?= BASE_URL ?>/public/assets/css/flaticon.css">
  <!-- Icomoon -->
  <link rel="stylesheet" href="<?= BASE_URL ?>/public/assets/css/icomoon.css">
  <script src="https://kit.fontawesome.com/c4254e24a8.js" crossorigin="anonymous"></script>
</head>

<body>

  <nav id="navBar" class="navbar-white">
    <a href="#"><img src="<?= BASE_URL ?>/public/assets/images/templates/logo-red.png" class="logo" /></a>
    <ul class="nav-links">
      <li><a href="<?= BASE_URL ?>/home">Home</a></li>
      <li><a href="#">All Houses & Hostels</a></li>
      <li><a href="#">Contact</a></li>
    </ul>
    <a href="" class="register-btn">Register Now</a>
    <i class="fas fa-bars" onclick="togglebtn()"></i>
  </nav>

  <div class="house-details">
    <div class="house-title">
      <h1><?= $infoHabitat['type_habitation']; ?> à louer</h1>
      <div class="row">
        <div>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star-half-alt"></i>
          <i class="far fa-star"></i>
          <span><?php echo rand(100, 400) ?>Reviews</span>
        </div>
        <div>
          <p>Location: <?= $infoHabitat['quartier']; ?></p>
        </div>
      </div>
    </div>

    <div class="gallery">
      <div class="gallery-img-1">
        <img src="<?= BASE_URL ?>/public/assets/images/templates/<?= $infoHabitat['first_photo']; ?>" />
      </div>
      <?php foreach ($otherPics as $photo) { ?>
        <div><img src="<?= BASE_URL ?>/public/assets/images/templates/<?= $photo; ?>" /></div>
      <?php } ?>
    </div>

    <div class="small-details">
      <h2><?= $infoHabitat['description']; ?></h2>
      <p>2+ guest &nbsp; &nbsp; <?= $infoHabitat['nb_chambres']; ?> rooms &nbsp; &nbsp; 1 bathroom</p>
      <h4>$ <?= $infoHabitat['loyer_jour']; ?> / day</h4>
    </div>
    <hr class="line" />

    <form action="<?= BASE_URL ?>/habitations/check" class="check-form" method="POST">
      <div>
        <label>Check-in</label>
        <input type="date" name="startDate" placeholder="Add Date" required />
      </div>
      <div>
        <label>Check-out</label>
        <input type="date" name="endDate" placeholder="Add Date" required />
        <input type="hidden" name="idCheck" value="<?= $infoHabitat['habitation_id']; ?>" />
      </div>
      <div class="guest-field">
        <label>Guest</label>
        <input type="text" placeholder="2 guest" />
      </div>
      <button type="submit">Check Availability</button>
    </form>

    <ul class="details-list">
      <li>
        <i class="fas fa-home"></i> Entire Home
        <span>You will have the entire flat for you.</span>
      </li>

      <li>
        <i class="fas fa-paint-brush"></i> Enhanced Clean
        <span>This host has committed to staybnb's cleaning process.</span>
      </li>

      <li>
        <i class="fas fa-map-marker-alt"></i> Great Location
        <span>90% of recent guests gave the location a 5 star rating.</span>
      </li>

      <li>
        <i class="fas fa-heart"></i> Great Check-in Experience
        <span>100% of recent guests gave the check-in process a 5 star
          rating.</span>
      </li>
    </ul>

    <hr class="line" />

    <div class="host">
      <img src="<?= BASE_URL ?>/public/assets/images/templates/host.png" />
      <div>
        <h2>Hosted by:ETU 3093 & ETU 3185</h2>
        <p>
          <span>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
          </span>
          &nbsp; &nbsp; 245 reviews &nbsp; &nbsp; Response Rate 100% &nbsp;
          &nbsp; Response Time: 60 min
        </p>
      </div>
    </div>
    <a href="" class="contact-host">Contact Host</a>
  </div>

  <div class="container">
    <div class="footer">
      <a href=""><i class="fab fa-facebook-f"></i></a>
      <a href=""><i class="fab fa-youtube"></i></a>
      <a href=""><i class="fab fa-twitter"></i></a>
      <a href=""><i class="fab fa-linkedin-in"></i></a>
      <a href=""><i class="fab fa-instagram"></i></a>
      <hr />
      <p>
        Copyright Ⓒ
        <script>
          document.write(new Date().getFullYear());
        </script>
        - Aryan, All rights reserved.
      </p>
    </div>
  </div>

  <script>
    var navBar = document.getElementById("navBar");

    function togglebtn() {
      navBar.classList.toggle("hide-menu");
    }
  </script>

</body>

</html>