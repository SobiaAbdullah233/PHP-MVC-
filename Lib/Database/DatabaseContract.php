<?php

namespace Lib\Database;

interface DatabaseContract {
    public static function instance();
    public function all(string $table):array;
    public function find(string $table, $id):array;
    public function save(string $table, array $data, $id=null):bool;
    public function delete(string $table, $id):bool;
}