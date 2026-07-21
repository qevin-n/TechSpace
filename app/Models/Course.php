<?php

namespace App\Models;

use PDO;

class Course
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    /**
     * Get all published courses
     */
    public function getAll(): array
    {
        $stmt = $this->db->query("
            SELECT *
            FROM courses
            WHERE status = 'published'
            ORDER BY created_at DESC
        ");

        return $stmt->fetchAll();
    }

    /**
     * Count all published courses
     */
    public function count(): int
    {
        $stmt = $this->db->query("
            SELECT COUNT(*)
            FROM courses
            WHERE status = 'published'
        ");

        return (int)$stmt->fetchColumn();
    }

    /**
     * Find a course by slug
     */
    public function findBySlug(string $slug): ?array
    {
        $stmt = $this->db->prepare("
            SELECT *
            FROM courses
            WHERE slug = :slug
            LIMIT 1
        ");

        $stmt->execute([
            ':slug' => $slug
        ]);

        $course = $stmt->fetch();

        return $course ?: null;
    }
    public function all(): array
{
    $stmt = $this->db->query("
        SELECT *
        FROM courses
        ORDER BY id DESC
    ");

    return $stmt->fetchAll();
}
public function find(int $id): ?array
{
    $stmt = $this->db->prepare("
        SELECT *
        FROM courses
        WHERE id = :id
        LIMIT 1
    ");

    $stmt->execute([
        ':id' => $id
    ]);

    $course = $stmt->fetch();

    return $course ?: null;
}
}