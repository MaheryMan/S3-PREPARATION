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

    <div class="header">

        <nav id="navBar" class="navbar-white">
            <a href="#"><img src="<?= BASE_URL ?>/public/assets/images/templates/logo-red.png" class="logo" /></a>
            <ul class="nav-links">
                <li><a href="<?= BASE_URL ?>/home">Home</a></li>
                <li><a href="#" class="active">All Houses & Hostels</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
            <a href="" class="register-btn">Register Now</a>
            <i class="fas fa-bars" onclick="togglebtn()"></i>
        </nav>

    </div>

    <div class="container">

        <h2 class="sub-title">Vacation Places</h2>
        <div class="container">
            <div class="trending">
                <?php foreach ($habitats as $habitat) { ?>
                    <div class="hotel-content">
                        <div class="hotel-grid" style="background-image: url(<?= BASE_URL ?>/public/assets/images/templates/<?= $habitat['photo_url']; ?>);">
                            <div class="price"><small>For as low as</small><span><?= $habitat['loyer_jour']; ?>/night</span></div>
                            <a class="book-now text-center" href="<?= BASE_URL ?>/habitations/book/<?= $habitat['habitation_id']; ?>"><i class="ti-calendar"></i> Book Now</a>
                        </div>
                        <div class="desc">
                            <h3><a href="#"><?= $habitat['quartier']; ?></a></h3>
                            <p><?= $habitat['description']; ?></p>
                        </div>
                    </div>
                <?php } ?>
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