<?php

namespace App\Controllers;

use App\Models\Course;

class CourseController
{
    private Course $courseModel;

    public function __construct()
    {
        $this->courseModel = new Course();
    }

    /**
     * Display all courses
     */
    public function index(): array
    {
        return [
            'courses' => $this->courseModel->getAll()
        ];
    }
    public function show(int $id): array
{
    $course = $this->courseModel->find($id);

    if (!$course) {

        http_response_code(404);

        die("Course not found.");

    }

    return [

        'course' => $course

    ];
}
}
