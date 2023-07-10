<?php

namespace Lib\Database;

class MySQL extends AbstractDatabase
{
    private $db;

    protected function init() {
        $config = config("database.mysql");
        $this->db = mysqli_connect($config['host'], $config['username'], $config['password'], $config['database']);
        if(!$this->db) {
            throw new \Exception("Unable to connect to database");
        }
    }

    public function all(string $table): array
    {
        $query = "SELECT * FROM {$table}";
        $result = $this->db->query($query);

        $return = [];
        while($row = $result->fetch_assoc()) {
            $return[] = $row;
        }

        return $return;
    }

    public function find(string $table, $id): array
    {
        $result = $this->db->query("SELECT * FROM {$table} WHERE id='{$id}'");
        return $result->fetch_assoc()[0] ?? [];
    }

    public function save(string $table, array $data, $id=null): bool
    {
        if($id) {
            $fields = "";
            array_walk($data, function ($value, $key) use ($fields){
                $fields .= "{$key} = '{$value}',";
            });
            $fields = substr($fields, 0, -1);
            $result = $this->db->query("UPDATE {$table} SET {$fields} WHERE id='{$id}'");
            return true;
        } else {
            $keys = implode(", ", array_keys($data));
            $values = implode(", ", array_values($data));
            $result = $this->db->query("INSERT INTO {$table} ({$keys}) VALUES ({$values})");
            return true;
        }

    }

    public function delete(string $table, $id): bool
    {
        $result = $this->db->query("DELETE FROM {$table} WHERE id='{$id}'");
    }
}