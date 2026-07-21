<?php

namespace App\Controllers;

use App\Models\User;
use App\Models\Course;

class DashboardController
{
    private User $userModel;
    private Course $courseModel;

    public function __construct()
    {
        $this->userModel = new User();
        $this->courseModel = new Course();
    }

    public function index(): array
    {
        if (!isset($_SESSION['user'])) {

            header("Location: ?page=login");
            exit;

        }

        return [

            'user' => $_SESSION['user'],

            'students' => $this->userModel->countStudents(),

            'admins' => $this->userModel->countAdmins(),

            'courses'   => $this->courseModel->count(),
'courseList' => $this->courseModel->all(),

        ];
    }
}