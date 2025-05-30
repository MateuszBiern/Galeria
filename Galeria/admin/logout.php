<?php
session_start();
session_destroy();
header('Location: /zaliczenie/index.php');

exit;