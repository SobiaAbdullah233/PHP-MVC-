<?php
$routes = [
    [
        "path" => "/",
        "controller" => "Website",
        "action" => "index"
    ],
    [
        "path" => "/haris",
        "controller" => "Website",
        "action" => "haris"
    ],
    [
        "path" => "/teachers",
        "controller" => "Website",
        "action" => "teachers"
    ],
    [
        "path" => "/students",
        "controller" => "Student",
        "action" => "index"
    ],
    [
        "path" => "/students/edit",
        "controller" => "Student",
        "action" => "edit"
    ]
];
