<?php

namespace Controllers;

use \Models\Student;
use \Models\Teacher;
class WebsiteController extends Controller {
    public function index() {
        return view("index", ['name' => 'Abdul Hannan']);
    }
    public function haris() {
        //echo "Hello Haris";
        var_dump(Teacher::all());
    }
    public function teachers() {
        return view("teachers.index", ['title' => 'Teachers', 'data' => Teacher::all()]);
    }
    public function students() {
        return view("students.index", ['title' => 'Students', 'data' => Student::all()]);
    }
}
