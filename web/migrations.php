<?php
/**
 * Created by PhpStorm.
 * User: grand
 * Date: 27-Feb-21
 * Time: 23:07
 */


require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../functions.php';

use app\controllers\AuthController;
use app\controllers\SiteController;
use emcode\phpmvc\Application;

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();


$config = [
    'db' => [
        'dsn' => $_ENV['DB_DSN'],
        'user' => $_ENV['DB_USER'],
        'password' => $_ENV['DB_PASSWORD']
    ]
];


$app = new Application(dirname(__DIR__), $config);

$app->db->applyMigrations();