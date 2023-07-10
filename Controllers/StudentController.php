<?php

namespace Controllers;

use \Models\Student;

class StudentController extends Controller {
    public function index() {
        return view("students.index", ['title' => 'Students', 'data' => Student::all()]);
    }
    public function edit() {
        echo "EDIT PAGE";
    }
    public function add() {
    }
    public function delete() {
    }
}
