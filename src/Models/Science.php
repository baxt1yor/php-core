<?php
namespace Website\Models;

use Website\Core\Model;

class Science extends Model
{
    protected string $table = "sciences";

    protected array $fillable = [
        "id",
        "name",
        "price"
    ];
}