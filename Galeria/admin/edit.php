<?php
require_once "../includes/db.php";
session_start();
if (!isset($_GET['id'])) {
    echo "Brak ID obrazka.";
    exit;
}

$id = (int) $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nazwa = $_POST['nazwa'];
    $kategoria = $_POST['kategoria'];
    $slowa = $_POST['slowa_kluczowe'];

    $stmt = $pdo->prepare("UPDATE obrazy SET nazwa = ?, kategoria = ?, slowa_kluczowe = ? WHERE id = ?");
    $stmt->execute([$nazwa, $kategoria, $slowa, $id]);

    header('Location: add.php');
    exit;
}

$stmt = $pdo->prepare("SELECT * FROM obrazy WHERE id = ?");
$stmt->execute([$id]);
$obraz = $stmt->fetch();

if (!$obraz) {
    echo "Nie znaleziono obrazka.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    
    <meta charset="UTF-8">
    <title>Edytuj obrazek</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<h2>Edytuj obrazek</h2>
<form method="post">
    Nazwa: <input type="text" name="nazwa" value="<?= htmlspecialchars($obraz['nazwa']) ?>" required><br>
    Kategoria:
    <select name="kategoria" required>
        <option value="zwierzeta" <?= $obraz['kategoria'] == 'zwierzeta' ? 'selected' : '' ?>>Zwierzęta</option>
        <option value="ludzie" <?= $obraz['kategoria'] == 'ludzie' ? 'selected' : '' ?>>Ludzie</option>
        <option value="przedmioty" <?= $obraz['kategoria'] == 'przedmioty' ? 'selected' : '' ?>>Przedmioty</option>
        <option value="krajobraz" <?= $obraz['kategoria'] == 'krajobraz' ? 'selected' : '' ?>>Krajobraz</option>
    </select><br>
    Słowa kluczowe: <input type="text" name="slowa_kluczowe" value="<?= htmlspecialchars($obraz['slowa_kluczowe']) ?>"><br>
    <button type="submit">Zapisz zmiany</button>
</form>

</body>
</html>
