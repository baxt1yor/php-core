<?php
declare(strict_types=1);

namespace Website\Core;

class Session
{
    public static function start(array $option): void
    {
        session_start($option);
    }

    public static function end(): void
    {
        session_destroy();
    }


}