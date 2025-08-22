<?php
require __DIR__ . '/../vendor/autoload.php';

use Pauld\PhpMvc\Controllers\HomeController;
use Pauld\PhpMvc\Controllers\ApiController;
use Pauld\PhpMvc\Middleware\Auth;

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$api = new ApiController();

if (strpos($uri, '/api') === 0) {
    // Protect API routes with HTTP Basic Auth
    Auth::basicAuth();

    if (preg_match('#^/api/users/$#', $uri, $matches)) {
        $api->users();
    } elseif (preg_match('#^/api/users/(\d+)$#', $uri, $matches)) {
        $api->user($matches[1]);
    } else {
        header("HTTP/1.0 404 Not Found");
        echo json_encode(["error" => "Route not found"]);
    }
} else {
    // Web routes remain public
    $controller = new HomeController();
    $controller->index();
}
