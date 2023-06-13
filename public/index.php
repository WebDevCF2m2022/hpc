<?php

session_start();

// charge le fichier de configuration
require_once '../config.php';

// autoload de nos classes depuis la racine PATH_ROOT en suivant l'arborescence
// des namespaces de nos classes
spl_autoload_register(
    function ($className) {
        $className = str_replace('\\', '/', $className);
        require_once '../' . $className . '.php';
    });

// connexion à la base de données en PDO
try {
    $pdo = new PDO(
        DB_DRIVER . ':host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=' . DB_CHARSET . ';port=' . DB_PORT,
        DB_USER,
        DB_PWD,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]
    );
} catch (PDOException $e) {
    echo 'Erreur de connexion : ' . $e->getMessage();
}



require_once "../controller/publicController.php";