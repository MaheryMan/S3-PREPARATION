<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>House Details Page - Designed by Aryan</title>
  <link rel="icon" href="./assets/images/logo.png" />
  <link rel="stylesheet" href="./assets/styles.css" />
  <script src="https://kit.fontawesome.com/c4254e24a8.js" crossorigin="anonymous"></script>
</head>

<body>

  <nav id="navBar" class="navbar-white">
    <a href="#"><img src="./assets/images/logo-red.png" class="logo" /></a>
    <ul class="nav-links">
      <li><a href="index.html">Home</a></li>
      <li><a href="house.html" class="active">Travel Outside</a></li>
      <li><a href="listing.html">All Houses & Hostels</a></li>
    </ul>
    <a href="" class="register-btn">Register Now</a>
    <i class="fas fa-bars" onclick="togglebtn()"></i>
  </nav>

  <div class="house-details">
    <div class="house-title">
      <h1>Wenge House</h1>
      <div class="row">
        <div>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star-half-alt"></i>
          <i class="far fa-star"></i>
          <span>245 Reviews</span>
        </div>
        <div>
          <p>Location: San Francisco, California, United State</p>
        </div>
      </div>
    </div>

    <div class="gallery">
      <div class="gallery-img-1">
        <img src="./assets/images/house-1.png" />
      </div>
      <div><img src="./assets/images/house-2.png" /></div>
      <div><img src="./assets/images/house-3.png" /></div>
      <div><img src="./assets/images/house-4.png" /></div>
      <div><img src="./assets/images/house-5.png" /></div>
    </div>

    <div class="small-details">
      <h2>Entire rental unit hosted by Brandon</h2>
      <p>2 guest &nbsp; &nbsp; 2 beds &nbsp; &nbsp; 1 bathroom</p>
      <h4>$ 100 / day</h4>
    </div>
    <hr class="line" />
    <form class="check-form">
      <div>
        <label>Check-in</label>
        <input type="text" placeholder="Add Date" />
      </div>
      <div>
        <label>Check-out</label>
        <input type="text" placeholder="Add Date" />
      </div>
      <div class="guest-field">
        <label>Guest</label>
        <input type="text" placeholder="2 guest" />
      </div>
      <button type="submit">Check Availbility</button>
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

    <p class="home-desc">
      Guests will be allocated on the ground floor according to availability.
      You get a comfortable Two bedroom apartment has a true city feeling. The
      price quoted is for two guest, at the guest slot please mark the number
      of guests to get the exact price for groups.
    </p>
    <hr class="line" />

    <div class="map">
      <h3>Location on map</h3>
      <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d21221.676224044128!2d-122.451917885570059!3d37.75203368896406!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80859a6d00690021%3A0x4a501367f076adff!2sSan%20Francisco%2C%20CA%2C%20USA!5e0!3m2!1sen!2sin!4v1641145357317!5m2!1sen!2sin"
        width="600" height="450" style="border: 0" allowfullscreen="" loading="lazy"></iframe>
      <b>San Francisco, California, United States</b>
      <p>It's like a home away from home.</p>
    </div>
    <hr class="line" />

    <div class="host">
      <img src="./assets/images/host.png" />
      <div>
        <h2>Hosted by Elon Musk</h2>
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