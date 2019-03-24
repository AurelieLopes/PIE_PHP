<?php

namespace Core;

class Request
{
    private $data = array();
    public function __construct($arg)
    {
        foreach ($arg as $key => $value) {
            $value = htmlspecialchars(stripcslashes(trim($value))); //on nettoie la value et on la re-stock
            $this->data[$key] = $value;
        }
        return $this->data;

    }

    public function getData()
    {
        return $this->data;
    }
}