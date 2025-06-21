<?php

$DSN_db = "mysql:host=localhost;dbname=bibliotheque_web;charset=utf8";
$USER_db = "root";
$PASSWORD_db = "Root";

try {
    $pdo = new PDO($DSN_db, $USER_db, $PASSWORD_db);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $pdo->setAttribute(PDO::FETCH_ASSOC, PDO::ATTR_DEFAULT_FETCH_MODE);
} catch (Exception $e) {
    echo "Erreur de connexion sql" . $e->getMessage();
}
