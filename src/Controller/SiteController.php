<?php

namespace Website\Controller;

use Website\Core\Controller;
use Website\Models\Student;

class SiteController extends Controller
{
    public function index(): string
    {
        $students = Student::query()->all();
        return $this->render('student', $students);
    }

    public function report(): string
    {
        return "report page";
    }
}