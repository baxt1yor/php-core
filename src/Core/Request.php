<?php
declare(strict_types=1);

namespace Website\Core;

use Website\Core\Interfaces\RequestInterface;

class Request implements RequestInterface
{
    private string $method;
    private string $path;
    public function __construct()
    {
        $this->method = $_SERVER['REQUEST_METHOD'];
        $this->path = $_SERVER['REQUEST_URI'];
    }

    public function getMethod(): string
    {
        return mb_strtolower($this->method);
    }

    public function getPath(): string
    {
        return $this->path;
    }

    public function isPost(): bool
    {
        return mb_strtoupper($this->method) === 'POST';
    }

    public function isGet(): bool
    {
        return mb_strtoupper($this->method) === 'GET';
    }
}