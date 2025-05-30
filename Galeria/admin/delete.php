<?php
require_once "../includes/db.php";
session_start();
if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];

    $stmt = $pdo->prepare("SELECT sciezka FROM obrazy WHERE id = ?");
    $stmt->execute([$id]);
    $row = $stmt->fetch();

    if ($row && file_exists("../" . $row['sciezka'])) {
        unlink("../" . $row['sciezka']);
    }

    $stmt = $pdo->prepare("DELETE FROM obrazy WHERE id = ?");
    $stmt->execute([$id]);
}

header("Location: add.php");
exit;
