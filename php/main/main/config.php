<?php
$DSN_db = "mysql:host=localhost;dbname=bibliotheque_db;charset=utf8";
$USER_db = "root";
$PASSWORD_db = "Root";

try {
    $pdo=new PDO($DSN_db,$USER_db,$PASSWORD_db);
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
} catch (Exception $e) {
    echo "connexion a echouer";
}