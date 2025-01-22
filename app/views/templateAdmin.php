<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Template</title>
    <link rel="stylesheet" href="assets/admin.css">
</head>
<body>
    <header>
        <h1>Admin Dashboard</h1>
        <nav>
            <ul>
                <li><a href="dashboard.php">Lister</a></li>
                <li><a href="settings.php">Ajouter</a></li>
                <li><a href="logout.php">Modifier</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <?php include 'page.php'; ?>
    </main>

    <footer>
        <p>&copy; 2024 My Company. All rights reserved.</p>
    </footer>
</body>
</html>