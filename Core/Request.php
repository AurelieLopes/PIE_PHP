<?php

namespace Core;

class Request
{
    public function __construct()
    {
        foreach ($_POST as $key => $value) {
            $this->{$key} = htmlspecialchars(stripcslashes(trim($value)));
        }
        foreach ($_GET as $key => $value) {
            $this->{$key} = htmlspecialchars(stripcslashes(trim($value)));
        }
    }
}
