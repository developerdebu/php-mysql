<?php
namespace Pauld\PhpMvc\Controllers;

use Pauld\PhpMvc\Models\User;

class HomeController
{
    public function index()
    {
        $user = new User("John Doe", "john@example.com");
        require __DIR__ . "/../Views/home.php";
    }
}
