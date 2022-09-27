<?php

namespace Website\Core\Exceptions;

use PDOException;

class DbConnectionException extends PDOException
{
    protected $message = "DB connection failed";
}