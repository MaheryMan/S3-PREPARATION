<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/assets/css/styles.css">
    <title>Document</title>
</head>

<body>
    <header>
        <h1>Gestion des Trajets</h1>
        <nav>
            <ul>
                <li><a href="/chauffeurs">Chauffeurs</a></li>
                <li><a href="/vehicules">Véhicules</a></li>
                <li><a href="/trajets">Trajets</a></li>
                <li><a href="/formulaire"> Insérer</a></li>
            </ul>
        </nav>
    </header>

    <section>
        <?php include($page . '.php'); ?>
    </section>

    <footer>
        <h2>For more details </h2>
    </footer>

</body>

</html>