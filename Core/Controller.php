<?php

namespace Core;

class Controller
{
    protected static $_render;
    public $request;

    public function __construct()
    {
        $this->request = new Request($_REQUEST);
    }

    protected function render($view, $scope = [])
    {
        $path = basename(str_replace("\\", "/", get_called_class()));
        extract($scope);
        $f = implode(DIRECTORY_SEPARATOR, [dirname(__DIR__), 'src', 'View', //corespond au chemin passé dans l'URL
            str_replace('Controller', '', $path), $view]) . '.php'; // on enleve le controleur de l'url et quand on va mettre le nom d'un fichier il rajoute le .php

        if (file_exists($f)) { //si le fichier existe
            ob_start(); //il bloque le chargement de la page jusqu'à ce qu'il chope le code
            include $f; // on fait le debut du chemin
            $view = ob_get_clean(); //on charge la page et on efface la mise en tampon
            ob_start(); // on bloque le chargement de la page dans un tampon
            include implode(DIRECTORY_SEPARATOR, [dirname(__DIR__), 'src', 'View', //on inclue le fichier au chemin
                'index']) . '.php';
            self::$_render = ob_get_clean(); //on charge et on efface le ob_start
        }
    }

    public function __destruct()
    {
        echo self::$_render;
    }
}