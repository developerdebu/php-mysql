<?php
namespace Pauld\PhpMvc\Middleware;

class Auth
{
    public static function basicAuth()
    {
        // Configure credentials
        $validUser = "admin";
        $validPass = "secret123";

        // Check if auth header exists
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            self::deny();
        }

        $user = $_SERVER['PHP_AUTH_USER'];
        $pass = $_SERVER['PHP_AUTH_PW'];

        // Validate
        if ($user !== $validUser || $pass !== $validPass) {
            self::deny();
        }
    }

    private static function deny()
    {
        header('WWW-Authenticate: Basic realm="My API"');
        header('HTTP/1.0 401 Unauthorized');
        echo json_encode(["error" => "Unauthorized"]);
        exit;
    }
}
