<?php

class Request
{
    private static $instance;

    private $request = [];

    private function __construct()
    {
        $this->request = $_REQUEST;
    }

    /**
     * @return Request
     */

    public static function getInstance()
    {
        if( static::$instance === null )
        {
            static::$instance = new static();
        }

        return static::$instance;
    }

    public function get( $variable )
    {
        return array_key_exists( $variable, $this->request ) ? $this->request[ $variable ] : null;
    }

    public function getMethod()
    {
        return $_SERVER['REQUEST_METHOD'];
    }
}