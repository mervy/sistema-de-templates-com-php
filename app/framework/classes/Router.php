<?php

namespace App\framework\classes;

use Exception;

class Router
{
    private string $path;
    private string $request;

    private function routerFound($routes)
    {
        //Se existir tal rota 'get'
        if (!isset($routes[$this->request])) {
            throw new Exception("Route {$this->path} does not exist");
        }

        //Se não existir o method *get* e a uri tipo */produto* por exemplo
        if (!isset($routes[$this->request][$this->path])) {
            throw new Exception("Route {$this->path} in {$this->request} does not exist");
        }
    }

    private function controllerFound(
        string $controllerNamespace,
        string $controller,
        string $action
    ) {
        if (!class_exists($controllerNamespace)) {
            throw new Exception("The controller {$controllerNamespace} not exist");
        }
        if (!method_exists($controllerNamespace, $action)) {
            throw new Exception("The action {$controllerNamespace} not exist in controller {$controllerNamespace}");
        }
    }

    public function execute($routes)
    {
        $this->path = path();
        $this->request = request();

        $this->routerFound($routes);

        //Divide o controller HomeController@index em duas partes
        [$controller, $action] = explode('@', $routes[$this->request][$this->path]);

        //Lógica para boquear as páginas com :auth no arquivo routes.php
        if (str_contains($action, ':')) {
            [$action, $auth] = explode(':', $action);

            if (!isset($_SESSION['logged'])) {
                return redirect('/');
            }
        }

        $controllerNamespace = "App\\controllers\\{$controller}";

        $this->controllerFound($controllerNamespace, $controller, $action);

        $controllerInstance = new $controllerNamespace;
        $controllerInstance->$action();
    }
}
