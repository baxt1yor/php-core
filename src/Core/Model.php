<?php
declare(strict_types=1);

namespace Website\Core;

use PDOException;
use Website\Core\Exceptions\DbConnectionException;

class Model
{
    protected string $table = '';
    protected array $fillable = ["*"];
    public DbConnection $db;
    private static $model;

    private string $sqlQuery = "";
    public function __construct()
    {
        try {
            $this->db = new DbConnection(
                "mysql:host=localhost;dbname=".$_ENV['DB_NAME'],
                $_ENV['DB_USER'],
                $_ENV['DB_PASSWORD']);
        } catch (PDOException) {
            throw new DbConnectionException();
        }
    }

    public static function query(): self
    {
        if (!(self::$model instanceof self)) {
            self::$model = new self();
        }
        return self::$model;
    }

    public function find(int $id, $columns = ['*'])
    {
        $columns = implode(', ', $columns);

        $table = $this->table;
        if (empty($table)) {
            $table = mb_strtolower(self::class);
        }
        $this->sqlQuery = sprintf("select %s from %s where id= %s", $columns, $table, $id);

        return $this->db->query($this->sqlQuery)->fetch();
    }

    protected function where(string $column, $value, string $operator = '='): self
    {
        $columns = implode(', ', $this->fillable);

        $table = $this->table;
        if (empty($table)) {
            $table = mb_strtolower(self::class);
        }
        $this->sqlQuery = sprintf("select %s from %s where $column $operator %s", $columns, $table, $value);
        return self::query();
    }

    public function all(): bool|array
    {
        if (empty($this->sqlQuery)) {
            $columns = implode(', ', $this->fillable);
            $this->sqlQuery = sprintf("select %s from %s", $columns, $this->table);
        }

        return $this->db->query($this->sqlQuery)->fetchAll();
    }

    public function one()
    {
        return $this->db->query($this->sqlQuery." limit 1")->fetch();
    }
}