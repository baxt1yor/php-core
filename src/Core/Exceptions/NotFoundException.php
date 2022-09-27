<?php

namespace Website\Core\Exceptions;

use Exception;

class NotFoundException extends Exception
{
    protected $message = "Not found :(";
}