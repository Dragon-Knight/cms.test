<?php

class Controller
{
    public function __construct()
    {

    }

    public function getRequest()
    {
        return Request::getInstance();
    }
}