<?php

namespace Core;

require_once '././src/routes.php';
class Core
{
    public function run()
    {
        echo __CLASS__ . "[OK]" . PHP_EOL;
        // methode dynamique
        $url = str_replace(BASE_URI, '', $_SERVER['REQUEST_URI']);
        var_dump($url);

        if (Router::get($url)) {
            $route = Router::get($url);
            $controller = "Controller\\" . ucFirst($route["controller"]) . "Controller";
            $action = $route["action"] . 'Action';

            var_dump($controller);
            var_dump($action);
            $a = new $controller();
            $a->$action();
            
        } else {
            include './src/View/Error/404.php';
        }
        //methode static
    }
}