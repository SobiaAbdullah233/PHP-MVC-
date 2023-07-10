<?php

namespace Models;

use Lib\Database\DatabaseContract;

class Model implements ModelContract {
    protected static $table;

    public function __construct() {
        if(!static::$table) {
            static::$table =  strtolower(preg_replace('/\B([A-Z])/', '_$1', get_called_class()));
        }
    }

    protected static function table() {
        $class = explode("\\", get_called_class());
        $class = end($class);
        return strtolower($class);
    }

    protected static function db():DatabaseContract {
        $class = "\\Lib\\Database\\".config('database.connection');
        return $class::instance();
    }

    public static function all():array {
        $result = static::db()->all(static::table());
        $return = [];
        foreach ($result as $data) {
            $model = new static;
            $model->fill($data);
            $return[] = $model;
        }

        return $return;
    }

    public static function find($id):ModelContract
    {
        $data = static::db()->find(static::table(), $id);
        $return = new static();
        $return->fill($data);
        return $return;
    }

    public function save():bool
    {
        return static::db()->save(static::table(), $this->toArray(), $this->id);
    }

    public function delete():bool
    {
        return static::db()->delete(static::table(), $this->id);
    }

    public function fill(array $data)
    {
        foreach($data as $key => $value) {
            $this->{$key} = $value;
        }
    }

    public function toArray(): array
    {
        return json_decode(json_encode($this), 1);
    }
}