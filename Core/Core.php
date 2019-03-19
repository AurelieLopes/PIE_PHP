<?php

namespace Core;

require_once '././src/routes.php';
class Core
{
    public function run()
    {
        // echo __CLASS__ . "[OK]" . PHP_EOL;
        // methode dynamique
        include './src/routes.php';
        $url = str_replace(BASE_URI,  '', $_SERVER['REQUEST_URI']);
        var_dump($url);

        if (Router::get($url)) {
            $route = Router::get($url);
            $controller = "Controller\\" . ucFirst($route["controller"]) . "Controller";
            var_dump($controller);
            $action = $route["action"] . 'Action';
            echo "pass";
            $a = new $controller();
            $a->$action();


        } else {
            include './src/View/Error/404.php';
        }
        //methode static
    }
}