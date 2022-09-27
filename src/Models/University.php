<?php

use Website\Core\Models;

class University extends Model
{
    protected string $table = "universities";

    protected array $fillable = [
        "id",
        "name",
        "location"
    ];
}