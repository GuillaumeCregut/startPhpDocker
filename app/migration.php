<?php

define('DB_DUMP_PATH', __DIR__ . '/database.sql');
define('DB_USER', getenv('DB_USER') ? getenv('DB_USER') : 'userDB');
define('DB_PASSWORD', getenv('DB_PASS') ? getenv('DB_PASS') : 'passDB');
define('DB_HOST', getenv('DB_HOST') ? getenv('DB_HOST') : 'db');
define('DB_NAME', getenv('DB_NAME') ? getenv('DB_NAME') : 'dbName');

require 'vendor/autoload.php';

try {
    $pdo = new PDO(
        'mysql:host=' . DB_HOST . '; charset=utf8',
        DB_USER,
        DB_PASSWORD
    );

    $pdo->exec('DROP DATABASE IF EXISTS ' . DB_NAME);
    $pdo->exec('CREATE DATABASE ' . DB_NAME);
    $pdo->exec('USE ' . DB_NAME);

    if (is_file(DB_DUMP_PATH) && is_readable(DB_DUMP_PATH)) {
        $sql = file_get_contents(DB_DUMP_PATH);
        if (!$sql) {
            throw new \RuntimeException('error reading db file');
        }
        $statement = $pdo->prepare($sql);
        $statement->execute();
    } else {
        echo DB_DUMP_PATH . ' file does not exist';
    }
} catch (PDOException $exception) {
    echo $exception->getMessage();
}
