<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Template</title>
    <link rel="stylesheet" href="assets/css/admin.css">
</head>
<body>
    <header>
        <h1>Admin Dashboard</h1>
        <nav>
            <ul>
                <li><a href="/admin">Lister</a></li>
                <li><a href="/ajouter">Ajouter</a></li>
                <li><a href="logout.php">Modifier</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <?php 
            if (isset($page)) {
                include($page.'.php');
            }
            else{
                echo "page non trouvee";
            }
        ?>
    </main>

    <footer>
        <p>&copy; 2024 My Company. All rights reserved.</p>
    </footer>
</body>
</html>