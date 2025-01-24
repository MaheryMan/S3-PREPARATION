<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Stay B&B</title>
  <link rel="icon" href="<?= BASE_URL ?>/public/assets/images/templates/logo.png" />
  <link rel="stylesheet" href="<?= BASE_URL ?>/public/assets/css/styles.css" />
  <script src="https://kit.fontawesome.com/c4254e24a8.js" crossorigin="anonymous"></script>
</head>

<body>

  <div class="header">
    <nav id="navBar">
      <a href=""><img src="<?= BASE_URL ?>/public/assets/images/templates/logo.png" class="logo" /></a>
      <ul class="nav-links">
        <li><a href="/home" class="active">Home</a></li>
        <li><a href="#">Travel Outside</a></li>
        <li><a href="#">All Houses & Hostels</a></li>

      </ul>
      <a href="" class="register-btn">Register Now</a>
      <i class="fas fa-bars" onclick="togglebtn()"></i>
    </nav>

    <div class="container">
      <h1>Find Your Next Stay</h1>
    </div>
  </div>

  <div class="container">
    <h2 class="sub-title">Exclusives</h2>
    <div class="exclusives">
      <div>
        <a href="#">
          <img src="<?= BASE_URL ?>/public/assets/images/templates/image-1.png" />
        </a>
        <span>
          <h3>London</h3>
          <p>Starts @ $250</p>
        </span>
      </div>

      <div>
        <a href="#">
          <img src="<?= BASE_URL ?>/public/assets/images/templates/image-2.png" />
        </a>
        <span>
          <h3>Paris</h3>
          <p>Starts @ $350</p>
        </span>
      </div>

      <div>
        <a href="#">
          <img src="<?= BASE_URL ?>/public/assets/images/templates/image-3.png" />
        </a>
        <span>
          <h3>Japan</h3>
          <p>Starts @ $550</p>
        </span>
      </div>

      <div>
        <a href="#">
          <img src="<?= BASE_URL ?>/public/assets/images/templates/image-4.png" />
        </a>
        <span>
          <h3>Kashmir</h3>
          <p>Starts @ $500</p>
        </span>
      </div>

      <div>
        <a href="#">
          <img src="<?= BASE_URL ?>/public/assets/images/templates/image-5.png" />
        </a>
        <span>
          <h3>Paradis Island</h3>
          <p>Starts @ $120</p>
        </span>
      </div>

      <div>
        <a href="#">
          <img src="<?= BASE_URL ?>/public/assets/images/templates/image-6.png" />
        </a>
        <span>
          <h3>Marley</h3>
          <p>Starts @ $800</p>
        </span>
      </div>

      <div>
        <a href="#">
          <img src="<?= BASE_URL ?>/public/assets/images/templates/image-7.png" />
        </a>
        <span>
          <h3>Birmingham</h3>
          <p>Starts @ $2800</p>
        </span>
      </div>

      <div>
        <a href="#">
          <img src="<?= BASE_URL ?>/public/assets/images/templates/image-8.png" />
        </a>
        <span>
          <h3>Rajasthan</h3>
          <p>Starts @ $600</p>
        </span>
      </div>

      <div>
        <a href="#">
          <img src="<?= BASE_URL ?>/public/assets/images/templates/image-9.png" />
        </a>
        <span>
          <h3>Kerrela</h3>
          <p>Starts @ $600</p>
        </span>
      </div>

      <div>
        <a href="#">
          <img src="<?= BASE_URL ?>/public/assets/images/templates/image-10.png" />
        </a>
        <span>
          <h3>Ukraine</h3>
          <p>Starts @ $600</p>
        </span>
      </div>

    </div>

    <h2 class="sub-title">Trending Places</h2>
    <div class="container">
      <div class="trending">
        <div>
          <img src="<?= BASE_URL ?>/public/assets/images/templates/dubai.png" />
          <h3>Dubai</h3>
        </div>
        <div>
          <img src="<?= BASE_URL ?>/public/assets/images/templates/new-york.png" />
          <h3>New York</h3>
        </div>
        <div>
          <img src="<?= BASE_URL ?>/public/assets/images/templates/paris.png" />
          <h3>Paris</h3>
        </div>
        <div>
          <img src="<?= BASE_URL ?>/public/assets/images/templates/new-delhi.png" />
          <h3>New Delhi</h3>
        </div>
        <div class="viewmore">
          <a href="<?= BASE_URL ?>/habitations/all"><button>View All</button></a>
        </div>
      </div>

    </div>

    <div class="cta">
      <h3>
        Sharing <br />
        Is Earning now
      </h3>
      <p>
        Great opportunity to make money by <br />
        sharing your extra space.
      </p>
      <a href="" class="cta-btn">Know More</a>
    </div>

    <h2 class="sub-title">Travellers Stories</h2>
    <div class="stories">
      <div>
        <img src="<?= BASE_URL ?>/public/assets/images/templates/story-1.png" />
        <p>Popular European countries with a budget of just $10,000</p>
      </div>
      <div>
        <img src="<?= BASE_URL ?>/public/assets/images/templates/story-2.png" />
        <p>Travelled more than 100 countries in less than a year</p>
      </div>
      <div>
        <img src="<?= BASE_URL ?>/public/assets/images/templates/story-3.png" />
        <p>Best experience you get while travelling to Thailand</p>
      </div>
    </div>
    <a href="" class="start-btn">Start making money</a>

    <div class="about-msg">
      <h2>About Staybnb</h2>
      <p>
        Contrary to popular belief, Lorem ipsum dolor sit amet consectetur
        adipisicing elit. Ad nulla, animi cumque sint vero autem repellat
        quasi laboriosam voluptatem blanditiis. Nihil dignissimos fuga in
        ipsam perferendis veniam ad culpa maiores cumque.
      </p>
    </div>

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