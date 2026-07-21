<?php

namespace App\Controllers;

use App\Models\User;

class AuthController
{
    private User $userModel;

    public function __construct()
    {
        $this->userModel = new User();
    }

    /**
     * Register a new user
     */
    public function register(array $data): array
    {
        $errors = [];

        // Remove extra spaces
        $data = array_map('trim', $data);

        // Required fields
        if (empty($data['first_name'])) {
            $errors[] = "First name is required.";
        }

        if (empty($data['last_name'])) {
            $errors[] = "Last name is required.";
        }

        if (empty($data['username'])) {
            $errors[] = "Username is required.";
        }

        if (empty($data['email'])) {
            $errors[] = "Email is required.";
        }

        if (empty($data['password'])) {
            $errors[] = "Password is required.";
        }

        // Email format
        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Invalid email address.";
        }

        // Password length
        if (strlen($data['password']) < 8) {
            $errors[] = "Password must be at least 8 characters.";
        }

        // Duplicate username
        if ($this->userModel->findByUsername($data['username'])) {
            $errors[] = "Username already exists.";
        }

        // Duplicate email
        if ($this->userModel->findByEmail($data['email'])) {
            $errors[] = "Email already exists.";
        }

        if (!empty($errors)) {
            return [
                'success' => false,
                'errors' => $errors
            ];
        }

        $this->userModel->create($data);

        return [
            'success' => true,
            'message' => 'Registration successful.'
        ];
    }

    /**
     * Login user
     */
    public function login(string $email, string $password): array
    {
        $user = $this->userModel->login($email, $password);

        if (!$user) {
            return [
                'success' => false,
                'message' => 'Invalid email or password.'
            ];
        }

        // Prevent inactive/banned users
        if ($user['status'] !== 'active') {
            return [
                'success' => false,
                'message' => 'Your account is not active.'
            ];
        }

        // Start session if needed
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $_SESSION['user'] = [
            'id' => $user['id'],
            'first_name' => $user['first_name'],
            'last_name' => $user['last_name'],
            'username' => $user['username'],
            'email' => $user['email'],
            'role' => $user['role']
        ];

        return [
            'success' => true,
            'message' => 'Login successful.'
        ];
    }

    /**
     * Logout
     */
    public function logout(): void
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        session_destroy();

        header('Location: /TechSpace/public/');
        exit;
    }
}