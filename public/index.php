<?php
require __DIR__ . '/../vendor/autoload.php';

use Pauld\PhpMvc\Controllers\HomeController;
use Pauld\PhpMvc\Controllers\ApiController;

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$api = new ApiController();

if (preg_match('#^/api/users/$#', $uri, $matches)) {
    $api->users();
} elseif (preg_match('#^/api/users/(\d+)$#', $uri, $matches)) {
    $api->user($matches[1]);
} else {
    /* echo "Welcome to the PHP MVC API!"; */
    $controller = new HomeController();
    $controller->index();
}
