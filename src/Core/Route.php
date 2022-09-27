<?php
declare(strict_types=1);

namespace Website\Core;

use JetBrains\PhpStorm\NoReturn;
use Website\Core\Enums\StatusCode;

class Route
{
    protected static array $routes = [];
    public static $_self;

    public function __construct(
        private Request $request,
        private Response $response
    ) {}

    public static function get(string $route, array $class): static
    {
        static::$routes['get'][$route] = $class;
        return self::getInstance();
    }

    public static function post(string $route, array $class): static
    {
        static::$routes['post'][$route] = $class;
        return self::getInstance();
    }

    public static function getInstance(): static
    {
        if (!(static::$_self instanceof self)) {
            static::$_self = new static(new Request(), new Response());
        }
        return static::$_self;
    }

    #[NoReturn]
    public function resolve(): void
    {
        $method = $this->request->getMethod();
        $path = $this->request->getPath();
        if (!isset(self::$routes[$method]) || !isset(self::$routes[$method][$path])) {
            $this->response->statusCode(StatusCode::NOT_FOUND->value);
            echo Application::$app->view->renderView("404", []);
            return;
        }
        $callable = self::$routes[$method][$path];
        $class = new $callable[0];
        $this->response->statusCode();
        echo call_user_func([$class, $callable[1]]);
    }
}