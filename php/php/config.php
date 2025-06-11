<?php
$DB_DSN = "mysql:host=localhost;dbname=form;charset=utf8";
$DB_USER = "root";
$DB_PASSWORD = "Root";
try {
    $pdo = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (Exception $e) {
    error_log("erreut" . $e->getMessage());
    die("connexion Echouer");
}
