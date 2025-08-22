<?php
require __DIR__ . '/../vendor/autoload.php';

use Pauld\PhpMvc\Controllers\HomeController;

$controller = new HomeController();
$controller->index();
