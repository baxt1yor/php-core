<?php

namespace Website\Core;

use Website\Core\Enums\StatusCode;

class Response
{
    public function json(array $response, )
    {

    }

    public static function response(): static
    {
        return new static();
    }

    public function statusCode(int $code = 200): void
    {
       http_response_code($code);
    }
}