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
    'userClass' => \app\models\User::class,
    'db' => [
        'dsn' => $_ENV['DB_DSN'],
        'user' => $_ENV['DB_USER'],
        'password' => $_ENV['DB_PASSWORD']
    ]
];


$app = new Application(dirname(__DIR__), $config);

$app->router->get('/', [SiteController::class, 'index']);

$app->router->get('/contacts', [SiteController::class, 'contact']);

$app->router->post('/contacts', [SiteController::class, 'contact']);

$app->router->get('/register', [AuthController::class, 'register']);
$app->router->post('/register', [AuthController::class, 'register']);
$app->router->get('/login', [AuthController::class, 'login']);
$app->router->post('/login', [AuthController::class, 'login']);

$app->router->get('/logout', [AuthController::class, 'logout']);

$app->router->get('/profile', [AuthController::class, 'profile']);

$app->run();