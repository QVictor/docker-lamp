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

                $internalRoute = preg_replace("~$uriPattern~", $path, $uri);
                //Определяем контроллер и action, обрабатывающий запрос
                $segments = explode('/', $internalRoute);

                $parameters = $segments;

                $this->nameController = $this->getNameController(array_shift($segments));

                $nameAction = $this->getActionController(array_shift($segments));


                $this->includeFileController();

                $controllerObject = new $this->nameController;
                $result = call_user_func_array(array($controllerObject, $nameAction), $segments);

                if ($result != null) {
                    break;
                }
            }
        }
    }

    private function getNameController($pathUrl)
    {
        return ucfirst($pathUrl . 'Controller');
    }

    private function getActionController($pathUrl)
    {
        return 'action' . ucfirst($pathUrl);
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
        return true;
    }
}