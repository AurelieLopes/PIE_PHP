<?php

namespace Core;

class Controller
{
    protected static $_render;
    protected function render($view, $scope = [])
    {
        $path = basename(str_replace("\\", "/", get_called_class()));
        extract($scope);
        $f = implode(DIRECTORY_SEPARATOR, [dirname(__DIR__), 'src', 'View',
            str_replace('Controller', '', $path), $view]) . '.php';
        var_dump($f);

        if (file_exists($f)) {
            ob_start();
            include $f;
            $view = ob_get_clean();
            ob_start();
            include implode(DIRECTORY_SEPARATOR, [dirname(__DIR__), 'src', 'View',
                'index']) . '.php';
            self::$_render = ob_get_clean();
        }}

    public function __destruct()
    {
        echo self::$_render;
    }}