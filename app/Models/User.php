<?php

namespace App\Models;

use PDO;

class User
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    /**
     * Create a new user
     */
    public function create(array $data): bool
    {
        $sql = "INSERT INTO users (
                    first_name,
                    last_name,
                    username,
                    email,
                    password
                ) VALUES (
                    :first_name,
                    :last_name,
                    :username,
                    :email,
                    :password
                )";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            ':first_name' => $data['first_name'],
            ':last_name'  => $data['last_name'],
            ':username'   => $data['username'],
            ':email'      => $data['email'],
            ':password'   => password_hash($data['password'], PASSWORD_DEFAULT),
        ]);
    }

    /**
     * Find user by email
     */
    public function findByEmail(string $email): ?array
    {
        $stmt = $this->db->prepare(
            "SELECT * FROM users WHERE email = :email LIMIT 1"
        );

        $stmt->execute([
            ':email' => $email
        ]);

        $user = $stmt->fetch();

        return $user ?: null;
    }

    /**
     * Find user by username
     */
    public function findByUsername(string $username): ?array
    {
        $stmt = $this->db->prepare(
            "SELECT * FROM users WHERE username = :username LIMIT 1"
        );

        $stmt->execute([
            ':username' => $username
        ]);

        $user = $stmt->fetch();

        return $user ?: null;
    }

    /**
     * Authenticate user
     */
    public function login(string $email, string $password): ?array
    {
        $user = $this->findByEmail($email);

        if (!$user) {
            return null;
        }

        if (!password_verify($password, $user['password'])) {
            return null;
        }

        return $user;
    }
}