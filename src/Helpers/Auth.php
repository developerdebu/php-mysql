<?php
namespace Pauld\PhpMvc\Helpers;

class Auth
{
    public static function startSession()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    public static function check()
    {
        self::startSession();
        if (!isset($_SESSION['user'])) {
            header('Location: /login');
            exit;
        }
    }

    public static function login($username)
    {
        self::startSession();
        $_SESSION['user'] = $username;
    }

    public static function logout()
    {
        self::startSession();
        unset($_SESSION['user']);
    }
}
