<?php
namespace Website\Core\Enums;

enum StatusCode: int
{
    case SUCCESS = 200;
    case CREATED = 201;
    case NOT_FOUND = 404;
    case PERMISSION_DENIED = 403;
    case UNAUTHORIZED = 401;
    case SERVER_ERROR = 500;
}