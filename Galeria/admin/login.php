<?php
session_start();

// Jeśli użytkownik już zalogowany, przekieruj do add.php
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    header('Location: add.php');
    exit;
}

// Proste dane logowania
$admin_user = 'admin';
$admin_pass = 'admin';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if ($username === $admin_user && $password === $admin_pass) {
        $_SESSION['logged_in'] = true;
        header('Location: add.php');
        exit;
    } else {
        $error = "Nieprawidłowy login lub hasło.";
    }
}
?>

<!DOCTYPE html>
<html lang="pl">
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <meta charset="UTF-8">
    <title>Logowanie</title>
</head>
<body class="login-page">
<div class="login-container">
    <h2>Panel logowania</h2>
    <?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <form method="POST">
  <label for="username">Login:</label>
  <input type="text" id="username" name="username" required>

  <label for="password">Hasło:</label>
  <input type="password" id="password" name="password" required>

  <button type="submit">Zaloguj</button>
</form>

     </div>
</body>
</html>
