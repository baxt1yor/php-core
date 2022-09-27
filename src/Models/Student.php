<?php

namespace Website\Models;

use Website\Core\Model;

class Student extends Model
{
    protected string $table = "students";

    protected array $fillable = [
        "id",
        "full_name",
        "group_id"
    ];

    public static function query(): self
    {
        return new self();
    }
}