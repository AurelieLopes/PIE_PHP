<?php
use Core\Router;

Router::connect('/', ['controller' => 'app', 'action' => 'index']);
Router::connect('/register', ['controller' => 'user', 'action' => 'register']);
Router::connect('/user/add', ['controller' => 'user', 'action' => 'add']);
Router::connect('/login', ['controller' => 'user', 'action' => 'login']);
Router::connect('/show', ['controller' => 'user', 'action' => 'show']);
