<?php
require_once "includes/db.php"; 
session_start();
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Galeria</title>
    <link rel="stylesheet" href="css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<header>
    <h1>Galeria</h1>
    <nav>
        <div id="menu-toggle">☰ Menu</div>
        <ul id="menu">
            <li><a href="index.php">Wszystkie</a></li>
            <li><a href="?kat=Zwierzęta">Zwierzęta</a></li>
            <li><a href="?kat=Ludzie">Ludzie</a></li>
            <li><a href="?kat=Przedmioty">Przedmioty</a></li>
            <li><a href="?kat=Krajobraz">Krajobraz</a></li>
            <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true): ?>
                <li><a href="admin/add.php">Panel admina</a></li>
                <li><a href="admin/logout.php">Wyloguj</a></li>
            <?php else: ?>
                <li><a href="admin/login.php">Panel admina</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</header>

<div class="gallery">
    <?php
    $warunek = "";
    if (isset($_GET['kat'])) {
        $kat = htmlspecialchars($_GET['kat']);
        $warunek = "WHERE kategoria = '$kat'";
    }
    $stmt = $pdo->query("SELECT * FROM obrazy $warunek ORDER BY data_dodania DESC");
    foreach ($stmt as $row) {
        echo '<div class="thumb">';
        echo '<img src="' . $row['sciezka'] . '" alt="' . $row['nazwa'] . '" class="thumbnail" data-id="' . $row['id'] . '" data-nazwa="' . $row['nazwa'] . '" data-sciezka="' . $row['sciezka'] . '">';
        echo '</div>';
    }
    ?>
</div>

<!-- Splashscreen -->
<div id="splashscreen" class="splashscreen">
    <span class="close-btn" id="close-splash">×</span>
    <img id="splash-image" src="" alt="Pełny obraz">
</div>

<script src="js/gallery.js"></script>
</body>
</html>
