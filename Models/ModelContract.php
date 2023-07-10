<?php

namespace Models;

interface ModelContract {
    public function fill(array $data);
    public function toArray():array;
    public static function all():array;
    public static function find($id):ModelContract;
    public function save():bool;
    public function delete():bool;
}