<?php

use App\Controllers\HomeController;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use Slim\Views\Twig;
use Slim\Views\TwigMiddleware;

require __DIR__ . '/../vendor/autoload.php';

const VIEW_PATH = __DIR__ . '/../views';
const STORAGE_PATH = __DIR__ . '/../storage';

$app = AppFactory::create();

$twig = Twig::create(VIEW_PATH, [
  'cache' => STORAGE_PATH . '/cache',
  'auto_reload' => true
]);

$app->add(TwigMiddleware::create($app, $twig));

$app->get('/', [HomeController::class, 'index']);
$app->get('/invoices', [InvoiceController::class, 'index']);

$app->run();
