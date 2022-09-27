<?php

namespace Website\Core;

class Controller
{
    public string $layout = 'main';

    public function setLayout($layout): void
    {
        $this->layout = $layout;
    }

    public function render($view, $params = []): string
    {
        return Application::$app->view->renderView($view, $params);
    }

    public function notFound(): string
    {
        return $this->render('404');
    }
}