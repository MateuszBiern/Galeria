<?php require_once "../includes/db.php"; 
session_start();


if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: login.php');
    exit;
}?>
<!DOCTYPE html>
<html>
<head>


    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8"><title>Dodaj obrazek</title>
<link rel="stylesheet" href="../css/style.css">



</head>
<body>
<h2>Dodaj obrazek</h2>
<form method="post" enctype="multipart/form-data">
    Nazwa: <input type="text" name="nazwa" required><br>
    Kategoria: <select name="kategoria" required>
    <option value="wszystkie">Wszystkie</option>
    <option value="zwierzeta">Zwierzęta</option>
    <option value="ludzie">Ludzie</option>
    <option value="przedmioty">Przedmioty</option>
    <option value="krajobraz">Krajobraz</option>
</select>
<br>
    Słowa kluczowe: <input type="text" name="slowa"><br>
    Plik: <input type="file" name="obrazek" accept="image/*" required><br>
    <button type="submit">Dodaj</button>
</form>



<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nazwa = $_POST['nazwa'];
    $kategoria = $_POST['kategoria'];
    $slowa = $_POST['slowa'];

    if (isset($_FILES['obrazek']) && $_FILES['obrazek']['error'] === UPLOAD_ERR_OK) {
        $ext = pathinfo($_FILES['obrazek']['name'], PATHINFO_EXTENSION);
        $nowa_nazwa = "uploads/" . time() . "." . $ext;
        move_uploaded_file($_FILES['obrazek']['tmp_name'], "../" . $nowa_nazwa);

        $stmt = $pdo->prepare("INSERT INTO obrazy (nazwa, sciezka, kategoria, slowa_kluczowe) VALUES (?, ?, ?, ?)");
        $stmt->execute([$nazwa, $nowa_nazwa, $kategoria, $slowa]);
        echo "<p>Dodano obrazek!</p>";
    }
}
?>

<a  class ="back" href="../index.php">
    <button type="button">Powrót do galerii</button>
</a>


<h2>Lista zdjęć</h2>
<table border="1" cellpadding="8" cellspacing="0">
    <tr>
        <th>Miniatura</th>
        <th>Nazwa</th>
        <th>Kategoria</th>
        <th>Słowa kluczowe</th>
        <th>Akcje</th>
    </tr>
    <?php
    $stmt = $pdo->query("SELECT * FROM obrazy ORDER BY data_dodania DESC");
    foreach ($stmt as $row) {
        echo "<tr>";
        echo "<td><img src='../" . $row['sciezka'] . "' width='100'></td>";
        echo "<td>" . htmlspecialchars($row['nazwa']) . "</td>";
        echo "<td>" . htmlspecialchars($row['kategoria']) . "</td>";
        echo "<td>" . htmlspecialchars($row['slowa_kluczowe']) . "</td>";
        echo "<td>
                <a href='edit.php?id=" . $row['id'] . "'><button>Edytuj</button></a>
                <a href='delete.php?id=" . $row['id'] . "' onclick=\"return confirm('Na pewno usunąć?');\"><button>Usuń</button></a>
              </td>";
        echo "</tr>";
    }
    ?>
</table>


</body>
</html>