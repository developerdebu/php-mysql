<?php
namespace Pauld\PhpMvc\Models;

use Pauld\PhpMvc\Database\Connection;
use JsonSerializable;
use PDO;

class User implements JsonSerializable
{
    public $id;
    public $name;
    public $email;
    public $age;
    public $created_at;

    public function __construct($id, $name, $email, $age, $created_at)
    {
        $this->id         = $id;
        $this->name       = $name;
        $this->email      = $email;
        $this->age        = $age;
        $this->created_at = $created_at;
    }

    public static function all(): array
    {
        $pdo = Connection::get();
        $stmt = $pdo->query("SELECT id, name, email, age, created_at FROM users ORDER BY id ASC");

        $users = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $users[] = new self(
                $row['id'],
                $row['name'],
                $row['email'],
                $row['age'],
                $row['created_at']
            );
        }

        return $users;
    }

    public static function find(int $id): ?User
    {
        $pdo = Connection::get();
        $stmt = $pdo->prepare("SELECT id, name, email, age, created_at FROM users WHERE id = ?");
        $stmt->execute([$id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            return new self($row['id'], $row['name'], $row['email'], $row['age'], $row['created_at']);
        }

        return null;
    }

    public function jsonSerialize(): array
    {
        return [
            'id'         => $this->id,
            'name'       => $this->name,
            'email'      => $this->email,
            'age'        => $this->age,
            'created_at' => $this->created_at,
        ];
    }
}
