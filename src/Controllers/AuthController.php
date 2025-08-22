<?php
namespace Pauld\PhpMvc\Controllers;

use Pauld\PhpMvc\Models\User;

class AuthController
{
    public function __construct()
    {
      if (session_status() === PHP_SESSION_NONE) {
          session_start();
      }
    }

    public function loginForm()
    {
      require __DIR__ . '/../Views/login.php';
    }

    public function login()
    {
      $email = $_POST['email'] ?? '';
      $password = $_POST['password'] ?? '';

      $user = User::findByEmail($email);

      if ($user && password_verify($password, $user['password'])) {
          $_SESSION['user_id'] = $user['id'];
          header("Location: /");
          exit;
      } else {
          echo "Invalid credentials";
      }
    }

    public function logout()
    {
      session_destroy();
      header("Location: /login");
      exit;
    }
}
