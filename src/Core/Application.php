<?php
declare(strict_types=1);

namespace Website\Core;

class Application
{
    public static Application $app;
    private Route $route;
    public static string $ROOT_DIR;
    public array $config;
    public string $layout = 'main';
    public View $view;
    public ?Controller $controller = null;

    public function __construct(string $rootDir, array $config = [])
    {
        self::$ROOT_DIR = $rootDir;
        $this->config = $config;
        self::$app = $this;
        $this->route = Route::getInstance();
        $this->view = new View();
    }

    public function run(): void
    {
        $this->route->resolve();
    }
}