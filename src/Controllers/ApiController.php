<?php
namespace Pauld\PhpMvc\Controllers;

use Pauld\PhpMvc\Models\User;

class ApiController
{
    public function users()
    {
        header('Content-Type: application/json');
        echo json_encode(User::all(), JSON_PRETTY_PRINT);
    }

    public function user($id)
    {
        header('Content-Type: application/json');
        $user = User::find((int)$id);

        if ($user) {
            echo json_encode($user, JSON_PRETTY_PRINT);
        } else {
            http_response_code(404);
            echo json_encode(['error' => 'User not found']);
        }
    }
}
