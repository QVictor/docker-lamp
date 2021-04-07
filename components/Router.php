<?php

class Router
{

    private $routes;
    public $nameController;

    public function __construct()
    {
        $routesPath = ROOT . '/config/routes.php';
        $this->routes = include($routesPath);
    }

    /**
     * Return request
     *
     * @return string
     */
    private function getURL()
    {
        if (!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }

    public function run()
    {
        //Получаем строку запроса
        $uri = $this->getURL();

        //Проверяем, есть ли запрос в routes
        foreach ($this->routes as $uriPattern => $path) {
            if (preg_match("~$uriPattern~", $uri)) {
                //Определяем контроллер и action, обрабатывающий запрос
                $segments = explode('/', $path);

                $this->nameController = $this->getNameController($segments);

                unset($segments[0]);

                $actionName = $this->getActionController($segments);

                $this->includeFileController();

                $controllerObject = new $this->nameController;
                $result = $controllerObject->$actionName();
                if ($result != null) {
                    break;
                }

            }
        }
    }

    private function getNameController($segments)
    {
        return ucfirst(array_shift($segments) . 'Controller');
    }

    private function getActionController($segments)
    {
        return 'action' . ucfirst(array_shift($segments));
    }

    private function getPathFileController()
    {
        // Подключить файл класса-контроллера
        return ROOT . '/controllers/' .
            $this->nameController . '.php';
    }

    private function includeFileController()
    {
        $pathFileController = $this->getPathFileController();
        if (file_exists($pathFileController)) {
            include_once($pathFileController);
        }
    }
}